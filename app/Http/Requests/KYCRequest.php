<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KYCRequest extends FormRequest
{
    protected $rules = [
        'POST' => [
            'redirect_url' => 'required',
            'type' => 'required|in:phone,user'
        ]
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->rules[$this->method()];
    }
}
