<?php

namespace App\Helpers\CustomerActions;

use Illuminate\Support\Facades\Facade as _Facade;

class Facade extends _Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CustomerActions';
    }
}