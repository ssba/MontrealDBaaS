<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class Database extends Ardent
{
    /**
     * Set not incremeniting ID.
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'databases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'customer', 'charset', 'name', 'collation', 'options'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Validators rules for Ardent validator
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required|string|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'customer' => 'required|string|exists:customers,id|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'charset' => 'string',
        'name' => 'required|string',
        'collation' => 'string|nullable',
        'options' => 'string|nullable'
    ];

    /**
     * Get the customer of this database
     */
    public function relatedCustomer()
    {
        return $this->belongsTo('App\Customer','id','customer');
    }

    /**
     * Get the request stats of this database
     */
    public function stats()
    {
        return $this->hasMany('App\RequestStats','database');
    }

    /**
     * Get the tables of this database
     */
    public function tables()
    {
        return $this->hasMany('App\Table','database');
    }

    /**
     * Get the customer actions of this database
     */
    public function actions()
    {
        return $this->hasMany('App\CustomerAction','database');
    }
}