<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\API\v1\Controller;
use App\Models\User;
use App\Traits\HasAccountSetup;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails, HasAccountSetup;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        $user = $request->user();

        if ($request->route('user') != $user->getKey()) {
            throw new AuthorizationException;
        }

        if ($request->user()->markEmailAsVerified()) {
            $this->completed($user, 'email');
            event(new Verified($request->user()));
        }

        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend verification email.
     *
     * @param  User   $user
     */
    public function resend(User $user)
    {
        $user->sendEmailVerificationNotification();

        return [
            'message' => 'Verification email sent!'
        ];
    }
}
