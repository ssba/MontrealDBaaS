<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class CustomerAction extends Ardent
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer_actions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'customer',
        'database',
        'table',
        'description',
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

        'type' => 'required|string|in:edit,update,delete',
        'customer' => 'required|string|exists:customers,id|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'database' => 'string|exists:databases,id|nullable|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'table' => 'string|exists:tables,id|nullable|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'description' => 'string',

    ];

    /**
     * Get the customer of this database
     */
    public function relatedDataBase()
    {
        return $this->belongsTo('App\Database','database');
    }

    /**
     * Get the customer of this database
     */
    public function relatedTable()
    {
        return $this->belongsTo('App\Table','table');
    }

    /**
     * Get the customer of this database
     */
    public function relatedCustomer()
    {
        return $this->belongsTo('App\Customer','id','database');
    }
}