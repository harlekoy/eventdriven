<?php

namespace App\Traits;

use App\Models\Upload;

trait HasAvatar
{
    /**
     * Boot HasAvatar.
     */
    protected static function bootHasAvatar()
    {
        static::updated(function ($model) {
            $avatar = array_get(
                $model->getDirty(),
                $model->avatarField()
            );

            // Delete old avatar once model
            // is updated with a new one
            if ($avatar) {
                Upload::where('image_url', $avatar)->delete();
            }
        });
    }

    /**
     * Get avatar field.
     *
     * @return string
     */
    public function avatarField()
    {
        return 'avatar';
    }
}
