<?php

namespace App\Traits;

use App\Models\User;
use App\ShuftiPro\ShuftiPro;

trait HasAccountSetup {

    protected $data;

    /**
     * Set user account step to true.
     *
     * @param  \App\Models\User   $user
     * @param  string $step
     *
     * @return void
     */
    public function completed(User $user, $step)
    {
        $user->accountSetup->fill([
            'user_id' => $user->id,
            $step => true
        ])->save();
    }

    /**
     * Send request for verification to ShuftiPro.
     *
     * @param  User $user
     * @param  array $info
     *
     * @return array
     */
    public function sendRequest($user, $info)
    {
        $type = $info['type'];
        $verify = new ShuftiPro();

        switch ($type) {
            case ShuftiPro::USER_VERIFY:
                $data = $this->userDetails($user, $info);

                break;
            case ShuftiPro::PHONE_VERIFY:
                $data = $this->phoneDetails($user, $info);

                break;
            default:
                $data = $this->userDetails($user, $info);

                break;
        }

        $response = $verify->request($data);
        $data = json_decode($response);

        return $data;
    }

    /**
     * Get status of verification request from ShuftiPro.
     *
     * @param  Uuid $referenceId
     *
     * @return array
     */
    public function getStatus($referenceId)
    {
        $request = new ShuftiPro();

        $response = $request->status($referenceId);
        $data = json_decode($response);

        return $data;
    }

    /**
     * Form data for phone verification.
     *
     * @param  \App\Models\User $user
     * @param  array $info
     *
     * @return array
     */
    private function phoneDetails($user, $info)
    {
       $this->data($user, $info);

        return $phone = array_merge($this->data['details'], [
            'phone' => [
                'phone_number' => $this->data['user']->phone_number,
            ]
        ]);
    }

    /**
     * Form data for user address details.
     *
     * @param  \App\Models\User $user
     * @param  array $info
     *
     * @return array
     */
    private function userDetails($user, $info)
    {
        $this->data($user, $info);

        return array_merge($this->data['details'], [
            'document' => [
                'supported_types' => [
                    'id_card',
                    'driving_license',
                    'passport'
                ],
                'name' => $this->data['name'],
                'dob' => $this->data['user']->dob,
            ],
            'address' => [
                'supported_types' => [
                    'id_card',
                    'bank_statement',
                    'driving_license',
                    'passport'
                ],
                'name' => $this->data['name'],
                'full_address' => $this->data['user']->fullAddress
            ]
        ]);
    }

    /**
     * Form ShuftiPro required params for request verification.
     *
     * @param  \App\Models\User $user
     * @param  array $info
     *
     * @return void
     */
    private function data($user, $info)
    {
        $this->data = [
            'user' => $user,
            'name' => [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
            ],
            'details' => [
                'reference' => $info['reference'] ?? null,
                // 'callback_url' => "http://f5e014c7.ngrok.io/api/v1/kyc-callback",
                'callback_url' => route('kyc.callback'),
                'redirect_url' => array_get($info, 'redirect_url', 'https://www.betprophet.co/'),
                'email' => $user->email,
                'country' => $user->address->alpha_2,
                'language' => "EN",
                'verification_mode' => 'any'
            ]
        ];
    }
}
