<?php

namespace App\Helpers\GUID;

use Illuminate\Support\Facades\Facade;

class RequestStatsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'RequestStats';
    }
}