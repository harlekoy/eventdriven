<?php

namespace App\Models;

use App\Traits\OnImageDelete;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Upload extends Model
{
    use OnImageDelete;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name',
        'image_url',
        'uploadable_id',
        'uploadable_type',
    ];

    /**
     * Get all of the owning uploadable models.
     */
    public function uploadable()
    {
        return $this->morphTo();
    }

    /**
     * Get cloudinary image url.
     *
     * @param  string $url
     *
     * @return string
     */
    public function getImageUrlAttribute($url)
    {
        return Storage::disk('cloudinary')->url($url);
    }
}
