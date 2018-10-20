<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use BelongsToTenants;
}
