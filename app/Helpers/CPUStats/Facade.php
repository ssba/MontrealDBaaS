<?php

namespace App\Helpers\CPUStats;

use Illuminate\Support\Facades\Facade as _Facade;

class Facade extends _Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CPUStats';
    }
}