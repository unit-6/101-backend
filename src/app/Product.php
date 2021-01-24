<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table Name
    protected $table = 'products';
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
        'name',
        'salesPrice',
        'currencyCode',
        'currencySymbol',
        'stockQty',
        'isActive',
        'merchant_id'
    ];
}
