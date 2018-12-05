<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Routing\Middleware\ValidateSignature as BaseValidateSignature;
use Illuminate\Support\Facades\Auth;

class ValidateSignature extends BaseValidateSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->hasValidSignature()) {
            $id = $request->route('user');

            if ($id) {
                Auth::loginUsingId($id);

                return $next($request);
            }
        }

        throw new InvalidSignatureException;
    }
}
