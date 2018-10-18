<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadRequest extends FormRequest
{
    /**
     * Get the uploadable types.
     *
     * @return array
     */
    public function uploadables()
    {
        return [
            'user' => User::class,
        ];
    }

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
        $rules =  $this->validationRules();

        return array_get($rules, $this->method(), []);
    }

    /**
     * Get the validation rules for the API.
     *
     * @return array
     */
    public function validationRules()
    {
        return [
            'POST' => [
                'file' => [
                    'required',
                    'mimes:jpeg,bmp,jpg,png',
                    'between:1, 6000'
                ]
            ],
            'PATCH' => [
                'type_id' => ['required'],
                'type_name' => [
                    'required',
                    Rule::in($this->uploadables()),
                ],
            ],
        ];
    }
}
