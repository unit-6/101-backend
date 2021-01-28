<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Table Name
    protected $table = 'transactions';
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
        'qty',
        'totalPrice',
        'currencyCode',
        'currencySymbol',
        'product_id',
        'sale_id'
    ];

    public function rel_sale() {
        return $this->belongsTo(Sale::class,'sale_id','id');
    }
}
