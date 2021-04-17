<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Support\Str;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider as UserProviderContract;

class UserServiceProvider extends EloquentUserProvider implements UserProviderContract
{
    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param UserContract $user
     * @param string $token
     * @return void
     */
    public function updateRememberToken(UserContract $user, $token)
    {
        $user->setRememberToken($token);

        $timestamps = $user->timestamps;

        $user->timestamps = false;

        $user->saveQuietly();

        $user->timestamps = $timestamps;
    }
}