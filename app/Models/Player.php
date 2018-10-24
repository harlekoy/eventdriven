<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Player extends Model
{
    use BelongsToTenants, LogsActivity;

    protected static $logAttributes = ['sport_league'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'player';
}
