<?php

namespace App\ShuftiPro;

class ShuftiPro
{
    // ShuftiPro services to verify
    const PHONE_VERIFY = 'phone';
    const USER_VERIFY = 'user'; // address and document

    // ShuftiPro Statuses
    const REQUEST_PENDING = 'request.pending';
    const REQUEST_TIMEOUT = 'request.timeout';
    const REQUEST_INVALID = 'request.invalid';
    const VERIFICATION_ACCEPTED = 'verification.accepted';
    const VERIFICATION_DECLINED = 'verification.declined';

    /**
     * Set client credentials.
     *
     * @return array
     */
    public function clientCredentials()
    {
        $credentials = [
            'url'        => env('SHUFTIPRO_API_URL'),
            'client_id'  => env('SHUFTIPRO_CLIENT_ID'),
            'secret_key' => env('SHUFTIPRO_CLIENT_SECRET'), // Replace with your secret key provided by the Shufti Pro.
        ];

        return $credentials;
    }

    /**
     * Request verification to ShuftiPro.
     *
     * @param  array $data
     *
     * @return string
     */
    public function request($data)
    {
        return $this->cURL($data, "api/");
    }

    /**
     * Request verification's status from ShuftiPro.
     *
     * @param  string $referenceId
     *
     * @return string
     */
    public function status($referenceId)
    {
        $data = ['reference' => $referenceId];

        return $this->cURL($data, "api/status");
    }

    /**
     * cURL to ShuftiPRo.
     *
     * @param  array $data
     * @param  string $route
     *
     * @return string
     */
    private function cURL($data, $route)
    {
        $credentials = $this->clientCredentials();
        $data['client_id'] = $credentials['client_id'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $credentials['url'].$route,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($data),
          CURLOPT_HTTPHEADER => array(
            "Authorization: Basic ".base64_encode($credentials['client_id'].":".$credentials['secret_key']),
            "Content-Type: application/json",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          return "cURL Error #:" . $err;
        } else {
          return $response;
        }
    }
}
