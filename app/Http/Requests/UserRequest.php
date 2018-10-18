<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    protected $rules = [
        'POST' => [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'dob' => 'nullable|date',
            'address' => [
                'address_1' => 'required',
                'address_2' => 'nullable',
                'city'  => 'nullable',
                'state' => 'nullable',
                'country' => 'required',
                'zip_code' => 'nullable'
            ]
        ],
        'PATCH' => [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'dob' => 'nullable|date',
            'address' => [
                'address_1' => 'required',
                'address_2' => 'nullable',
                'city'  => 'nullable',
                'state' => 'nullable',
                'country' => 'required',
                'zip_code' => 'nullable'
            ]
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