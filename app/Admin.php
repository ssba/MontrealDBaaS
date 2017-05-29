<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     *
     *
     * @var string
     */
    protected $guard = 'web';

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
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fname', 'lname', 'type', 'email', 'password', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Validators rules for Ardent validator
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required|string|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'fname' => 'required|string',
        'lname' => 'required|string',
        'type' => 'required|string|in:manager,superadmin',
        'email' => 'required|email',
        'password' => 'required|string',
        'gender' => 'required|string|min:1|max:1|in:m,f',
    ];


    /**
     * Get the links of the Users
     */
    public function customerRelationships()
    {
        return $this->hasMany('App\CustomerToAdmin','admin','id');
    }

    /**
     * Get the links of the Users
     */
    public function settings()
    {
        return $this->hasOne('App\AdminSetting','admin','id');
    }
}