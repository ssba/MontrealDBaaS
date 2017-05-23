<?php

namespace App\Helpers\GUID;

use Illuminate\Support\Facades\Facade;

class CustomerActionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CustomerActions';
    }
}