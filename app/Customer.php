<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomResetPasswordNotification as ResetPasswordNotification;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     *
     *
     * @var string
     */
    protected $guard = 'web_admins';

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
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'fname', 'lname', 'email', 'password', 'gender',
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
        'fname' => 'required|string',
        'lname' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|string',
        'gender' => 'required|string|min:1|max:1|in:m,f',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the links of the Admins
     */
    public function customerRelationships()
    {
        return $this->hasMany('App\CustomerToAdmin','customer','id');
    }

    /**
     * Get the links of the Users
     */
    public function settings()
    {
        return $this->hasOne('App\CustomerSetting','customer','id');
    }
}