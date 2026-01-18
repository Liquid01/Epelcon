<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //

    protected $fillable = [

        'store_id',
        'product_id',
        'SKU',
        'quantity',
        'reorder_level',
        'status',
        'cost_price',
        'sales_price',
        'last_cost_price',
        'last_sales_price',
        'vat',
        'status',
        'deleted_by',
        'deleted_at',
        'expiry_date',
        'mfd_date',
    ];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
