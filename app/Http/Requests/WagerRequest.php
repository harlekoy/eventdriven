<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WagerRequest extends FormRequest
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
            'sport_event_id'     => ['required'],
            'type_id'            => ['required'],
            'bet_type'           => ['required'],
            'total_wager_value'  => ['required'],
            'odds'               => ['required'],
            'selling_percentage' => ['required'],
            'selling_price'      => ['required'],
        ];
    }
}
