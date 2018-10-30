<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BetradarModel extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'betradar_data' => 'array',
    ];

    /**
     * Fill data based on betradar changes.
     *
     * @param  array $data
     *
     * @return void
     */
    public function betradarFill($data)
    {
        if ($this->betradar_data !== $data) {
            $this->fill($data);
            $this->betradar_data = $data;
        }

        return $this;
    }
}
