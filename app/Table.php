<?php

namespace App;

use LaravelArdent\Ardent\Ardent;

class Table extends Ardent
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
    protected $table = 'tables';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'database', 'name', 'collation', 'charset', 'comment', 'cache'
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
        'database' => 'required|string|exists:databases,id|regex:/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/',
        'name' => 'required|string|not_in:id',
        'collation' => 'string|nullable',
        'charset' => 'string',
        'comment' => 'string|nullable',
        'cache' => 'int|nullable'
    ];

    /**
     * Get the customer of this database
     */
    public function relatedDataBase()
    {
        return $this->belongsTo('App\Database','id','database');
    }

    /**
     * Get the customer actions of this database
     */
    public function actions()
    {
        return $this->hasMany('App\CustomerAction','table');
    }
}