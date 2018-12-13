<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChangePasswordRequest $request)
    {
        $changed = $this->changePassword($request);

        if ($changed) {
            return response()->json([
                'message' => 'Successfully changed password',
            ]);
        }

        return response()->json([
            'Wrong credentials',
        ], 400);
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        if (Hash::check($request->get('old_password'), $user->password)) {
            $user->password = $request->get('password');
            return $user->save();
        }
    }
}
