<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use BelongsToTenants;
}
