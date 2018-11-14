<?php

namespace App\ShuftiPro;

class ShuftiPro
{
    protected $verificationServices;

    protected $postData;

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
     * Set post data.
     *
     * @param  array $data
     *
     * @return void
     */
    public function postData($data)
    {
        $credentials = $this->clientCredentials();
        $this->verificationServices = $this->verificationServices($data);

        $this->postData = array_only($data, [
            'reference',
            'email',
            'phone_number',
            'country',
            'lang',
            'callback_url',
            'redirect_url',
        ]);

        $this->postData['verification_services'] = $this->verificationServices;
        $this->postData['client_id'] = $credentials['client_id'];

        ksort($this->postData); // Sort the all request parameter.
        $rawData = implode("", $this->postData) . $credentials['secret_key'];

        $signature = hash("sha256", $rawData);
        $this->postData["signature"] = $signature;
    }

    /**
     * Encode verification services data.
     *
     * @param  array $data
     *
     * @return string
     */
    public function verificationServices($data)
    {
        $this->verificationServices = array_only($data, [
            'document_type',
            'document_id_no',
            'document_expiry_date',
            'address',
            'first_name',
            'last_name',
            'dob',
            'background_checks'
        ]);

        return json_encode($this->verificationServices);
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
        $credentials = $this->clientCredentials();
        $this->postData($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $credentials['url']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        #Parse Response body
        $response = json_decode($response);

        #Verify Response signature
        $my_signature = hash("SHA256", $response->status_code . $response->message . $response->reference . $credentials['secret_key']);

        if($my_signature == $response->signature){
            # Response is valid. Now you can redirect your customer if you receive status code SP2
            if($response->status_code == "SP2"){
                header("Location: " . $response->message);
            }
            else{
                echo $response->message;
            }
        }
        else{
            echo "Response signature is invalid";
        }
    }
}
