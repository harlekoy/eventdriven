<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\KYCRequest;
use App\Http\Resources\KYCResource;
use App\Models\KYCVerification as KYC;
use App\Models\User;
use App\ShuftiPro\ShuftiPro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KYCController extends Controller
{
    /**
     * Create verification request to ShuftiPro.
     *
     * @param  \App\Models\User   $user
     *
     * @return \App\Http\Resources\KYCResource
     */
    public function verify(Request $request, User $user)
    {
        $verify = new ShuftiPro();

        $data = $this->verifyRequestData($request, $user);

        $response = $verify->request($data);
        $data = json_decode($response);

        $kyc = KYC::create([
            'user_id' => $user->id,
            'reference' => $data->reference,
            'event' => $data->event,
            'verification_url' => $data->verification_url,
            'email' => $data->email
        ]);

        return new KYCResource($kyc);
    }

    /**
     * Request verification status from ShuftiPro.
     *
     * @param  \App\Http\Controllers\API\v1\KYCVerification $kyc
     *
     * @return \App\Http\Resources\KYCResource
     */
    public function status(KYC $kyc)
    {
        $request = new ShuftiPro();

        $response = $request->status($kyc->reference);
        $data = json_decode($response);

        $kyc->fill([
            'event' => $data->event,
        ])->save();

        return new KYCResource($kyc);
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

    /**
     * Construct verification request.
     *
     * @param  \App\Models\User $user
     *
     * @return array
     */
    private function verifyRequestData($request, $user)
    {
        $name = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ];

        $data = [
            'reference' => uniqid(),
            // 'callback_url' => "http://f5e014c7.ngrok.io/api/v1/kyc-callback",
            'callback_url' => route('kyc.callback'),
            'redirect_url' => array_get($request->all(), 'redirect_url', 'https://www.betprophet.co/'),
            'email' => $user->email,
            'country' => $user->address->alpha_2,
            'language' => "EN",
            'verification_mode' => 'any',
            'document' => [
                'supported_types' => ['id_card','driving_license','passport'],
                'name' => $name,
                'dob' => $user->dob,
            ],
            'address' => [
                'supported_types' => ['id_card','bank_statement','driving_license','passport'],
                'name' => $name,
                'full_address' => $user->fullAddress
            ],
            'phone' => [
                'phone_number' => $user->phone_number,
            ]
        ];

        return $data;
    }
}
