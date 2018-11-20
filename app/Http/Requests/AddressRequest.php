<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    protected $rules = [
        'POST' => [
            'address_1' => 'required',
            'address_2' => 'nullable',
            'city'      => 'required',
            'state'     => 'nullable',
            'country'   => 'required',
            'alpha_2'   => 'required|exists:countries,alpha_2',
            'zip_code'  => 'nullable'
        ],
        'PATCH' => [
            'address_1' => 'required',
            'address_2' => 'nullable',
            'city'      => 'required',
            'state'     => 'nullable',
            'country'   => 'required',
            'alpha_2'   => 'required|exists:countries,alpha_2',
            'zip_code'  => 'nullable'
        ],
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
