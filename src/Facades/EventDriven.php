<?php

namespace Harlekoy\EventDriven\Facades;

use Illuminate\Support\Facades\Facade;

class EventDriven extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'eventdriven';
    }
}
