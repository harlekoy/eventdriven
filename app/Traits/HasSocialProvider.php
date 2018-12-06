<?php

namespace App\Traits;

use App\Models\SocialProvider;

trait HasSocialProvider
{
    /**
     * Get user social providers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }
}
