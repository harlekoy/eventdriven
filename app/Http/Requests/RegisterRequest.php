<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
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
        return [
            'username'   => 'required|string|max:255|unique:users,username|bail',
            'first_name' => 'required|string|max:255|bail',
            'last_name'  => 'required|string|max:255|bail',
            'email'      => 'required|string|email|max:255|unique:users|bail',
        ];
    }
}
