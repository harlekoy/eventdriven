<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Transaction extends Model
{
    use HasUuid, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'balance',
        'date',
        'from',
        'issue_type',
        'note',
        'transaction_type',
    ];

    protected static $logAttributes = [
        'balance',
        'date',
        'from',
        'issue_type',
        'note',
        'transaction_type'
    ];

    protected static $logOnlyDirty = true;
    protected static $logName = 'transaction';
}
