<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerSetting extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer', 'tpl_skin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id','customer'
    ];

    /**
     * Validators rules for Ardent validator
     *
     * @var array
     */
    public static $rules = [

        'customer' => 'required|string|exists:customers,id|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'tpl_skin' => 'required|string|in:skin-blue, skin-black, skin-red, skin-yellow, skin-purple, skin-green, skin-blue-light, skin-black-light, skin-red-light, skin-yellow-light, skin-purple-light, skin-green-light',

    ];

    /**
     * Get the customer of this database
     */
    public function customer()
    {
        return $this->belongsTo('App\Customers','admin');
    }

}
