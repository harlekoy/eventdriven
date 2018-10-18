<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_name',
        'image_url',
        'model_id',
        'model_type',
    ];

    /**
     * Get all of the owning uploadable models.
     */
    public function uploadable()
    {
        return $this->morphTo();
    }
}
