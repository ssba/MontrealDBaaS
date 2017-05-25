<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class CPUStat extends Ardent
{
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cpu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'percentage'
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
        'percentage' => 'required|integer|between:0,100',
    ];
}
