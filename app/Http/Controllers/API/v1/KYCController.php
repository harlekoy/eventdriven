<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\KYCRequest;
use App\Http\Resources\KYCResource;
use App\Models\KYCVerification as KYC;
use App\Models\User;
use App\ShuftiPro\ShuftiPro;
use App\Traits\HasAccountSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KYCController extends Controller
{
    use HasAccountSetup;

    /**
     * Create verification request to ShuftiPro.
     *
     * @param  \App\Models\User   $user
     *
     * @return \App\Http\Resources\KYCResource
     */
    public function verify(KYCRequest $request, User $user)
    {
        $info = $request->all();
        $type = $info['type'];
        $kyc = $user->latestVerification($type);

        if (!$user->address) {
            return [
                'data' => [
                    'message' => 'User has no address set!'
                ]
            ];
        }

        if (!$user->isUserVerified($type)) {
            $kyc = KYC::create([
                'user_id' => $user->id
            ]);

            $info['reference'] = $kyc->uuid;
            $response = $this->sendRequest($user, $info);

            if ($response->event === ShuftiPro::REQUEST_INVALID) {
                $kyc->fill([
                    'type' => $type,
                    'user_id' => $user->id,
                    'uuid' => $response->reference,
                    'event' => $response->event,
                    'notes' => json_encode($response->error)
                ])->save();

                return [
                    'data' => [
                        'status' => $response->event,
                        'message' => $response->error->message
                    ]
                ];
            }

            $kyc->fill([
                'type' => $type,
                'user_id' => $user->id,
                'uuid' => $response->reference,
                'event' => $response->event,
                'verification_url' => $response->verification_url,
                'email' => $response->email
            ])->save();
        }

        return new KYCResource($kyc);
    }

    /**
     * Request verification status from ShuftiPro.
     *
     * @param  \App\Http\Controllers\API\v1\KYCVerification $kyc
     *
     * @return \App\Http\Resources\KYCResource
     */
    public function status(User $user, $type = 'user')
    {
        if ($kyc = $user->latestVerification($type)) {
            $response = $this->getStatus($kyc->uuid);

            $kyc->fill([
                'event' => $response->event,
            ])->save();

            if ($response->event == ShuftiPro::VERIFICATION_ACCEPTED) {
                $step = $type === 'user' ? 'kyc' : 'phone';
                $this->completed($user, $step);
            }

            return new KYCResource($kyc);
        }

        return [
            'status' => false,
            'data' => [
                'message' => 'User made no request for verification.'
            ]
        ];
    }

    /**
     * Server to server calls to keep you updated about the verification state.
     *
     * @param  Request  $request
     */
    public function callback(Request $request)
    {
        Log::info($request);
    }
}
