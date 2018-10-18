<?php

namespace App\Repository;

use App\Auth0\ManagementAPI;
use App\Models\User;
use Auth0\Login\Contract\Auth0UserRepository;

class UserRepository implements Auth0UserRepository {

    /* This class is used on api authN to fetch the user based on the jwt.*/
    public function getUserByDecodedJWT($jwt) {
      /*
       * The `sub` claim in the token represents the subject of the token
       * and it is always the `user_id`
       */
      $jwt->user_id = $jwt->sub;

      return $this->upsertUser($jwt);
    }

    public function getUserByUserInfo($userInfo) {
      return $this->upsertUser($userInfo['profile']);
    }

    protected function upsertUser($profile) {

      // Note: Requires configured database access
      $user = User::where("auth0id", $profile->user_id)->first();

      if ($user === null) {
        $user = User::where('email', $profile->email)->first();

        if ($user) {
          $api = ManagementAPI::create();
          $identity = explode('|', $profile->user_id);

          $api->users->linkAccount($user->auth0id, [
              'provider' => head($identity),
              'user_id'  => last($identity),
          ]);
        } else {
          $user = User::create([
            'email'    => $profile->email,
            'auth0id'  => $profile->user_id,
            'name'     => $profile->name
          ]);
        }
      }

      return $user;
    }

    public function getUserByIdentifier($identifier) {
        //Get the user info of the user logged in (probably in session)
        $user = \App::make('auth0')->getUser();

        if ($user === null) return null;

        // build the user
        $user = $this->getUserByUserInfo($user);

        // it is not the same user as logged in, it is not valid
        if ($user && $user->auth0id == $identifier) {
            return $user;
        }
    }

}
