<?php

namespace App\Helpers\CustomerActions;

use Illuminate\Support\Facades\Facade;

class CustomerActionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CustomerActions';
    }
}