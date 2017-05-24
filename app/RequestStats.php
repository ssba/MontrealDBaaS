<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class RequestStats extends Ardent
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests_stats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'method',
        'type',
        'database',
        'ip',
        'country',
        'deviceFamily',
        'deviceModel',
        'responseCode',
        'responseError',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * Validators rules for Ardent validator
     *
     * @var array
     */
    public static $rules = [

        'method' => 'required|string|in:get,post,put,delete',
        'type' => 'required|string|in:rest,graph',
        'database' => 'required|string|exists:databases,id|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'ip' => 'required|string|ipv4',
        'country' => 'required|string',
        'os' => 'required|string',
        'browser' => 'required|string',
        'responseCode' => 'required|int',
        'responseError' => 'required|boolean',

    ];

}