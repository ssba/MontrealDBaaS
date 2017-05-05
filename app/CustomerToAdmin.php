<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class CustomerToAdmin extends Ardent
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
    protected $table = 'customer_to_admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'customer', 'admin'
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
        'customer' => 'required|string|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'admin' => 'required|string|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/'
    ];

    /**
     * Get the customer of this relationship
     */
    public function relatedCustomer()
    {
        return $this->belongsTo('App\Customer','id','customer');
    }

    /**
     * Get the admin of this relationship
     */
    public function relatedAdmin()
    {
        return $this->belongsTo('App\Admin','id','admin');
    }

}