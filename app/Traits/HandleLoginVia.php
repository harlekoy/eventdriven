<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

trait HandleLoginVia
{
    /**
      * Redirect the user to the Google authentication page.
      *
      * @param \Illuminate\Http\Request $request
      *
      * @return \Illuminate\Http\Response
      */
    public function redirectToProvider(Request $request)
    {
        return Socialite::driver($request->route('provider'))->stateless()->redirect();
    }

    /**
     * Get the social user.
     *
     * @param  string $provider
     *
     * @return StdClass
     */
    protected function socialUser($provider)
    {
        return Socialite::driver($provider)->stateless()->user();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        try {
            $provider = $request->route('provider');
            $user = $this->socialUser($provider);
            $method = 'handle'.studly_case($provider);

            if (method_exists($this, $method)) {
                $currentUser = $this->$method($user);
            }

            $currentUser->socialProviders()->firstOrCreate([
                'provider'    => $provider,
                'provider_id' => $user->id,
            ]);
        } catch (Exception $e) {
            return redirect('/login');
        }

        return $this->socialAuthenticated($request);
    }

    /**
     * Social authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function socialAuthenticated($request)
    {
        $response = $this->authenticated($request, $this->guard()->user());
        $params = json_decode($response->getContent(), true);

        return redirect($this->redirectPath().'?'.http_build_query($params));
    }
}
