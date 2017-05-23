<?php

namespace App\Helpers\GUID;

use Illuminate\Support\Facades\Facade;

class CPUStatsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CPUStats';
    }
}