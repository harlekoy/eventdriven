<?php

namespace App\Http\Controllers\API\v1;

use App\Auth0\ManagementAPI;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        event(new Registered($user = $this->create($request->all())));

        return new UserResource($user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username',
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
        ]);

        $validator->validate();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::whereEmail($data['email'])->first();

        if ($user) { // Link account
            $api = ManagementAPI::create();

            $api->users->linkAccount($user->auth0id, [
                'provider' => 'auth0',
                'user_id'  => $data['auth0id'],
            ]);

            return $user;
        } else {
            return User::create($data);
        }
    }
}
