<?php

namespace App\Helpers\RequestStats;

use Illuminate\Support\Facades\Facade as _Facade;

class Facade extends _Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RequestStats';
    }
}