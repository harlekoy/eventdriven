<?php

namespace App\Traits;

use App\Models\Address;
use App\Models\User;
use JD\Cloudder\Facades\Cloudder;

trait OnImageDelete
{
    /**
     * Boot has address.
     */
    protected static function bootOnImageDelete()
    {
        static::deleted(function ($model) {
            // Remove from Cloudinary
            Cloudder::delete($model->publicId());

            // Clear all user using that avatar
            User::where('avatar', $model->image_url)
                ->get()
                ->each(function ($user) {
                    $user->fill(['avatar' => ''])->save();
                });
        });
    }

    /**
     * Get public ID.
     *
     * @return string
     */
    public function publicId()
    {
        return head(explode('.', last(explode('/', $this->image_url))));
    }
}
