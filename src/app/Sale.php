<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    // Table Name
    protected $table = 'sales';
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
        'cost',
        'profit',
        'currencyCode',
        'currencySymbol',
        'status',
        'merchant_id'
    ];
}
