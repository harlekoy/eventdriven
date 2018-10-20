<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function store(RegisterRequest $request)
    {
        // For validation purposes
    }
}
