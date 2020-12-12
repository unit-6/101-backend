<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    // Table Name
    protected $table = 'merchants';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'udid',
        'phoneModel',
        'osVersion',
        'platform',
        'appVersion',
        'isActive',
        'isAccess'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'key', 'udid',
    ];
}
