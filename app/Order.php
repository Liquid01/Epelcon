<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['owner', 'items', 'amount', 'status', 'issued_date', 'issued_by', 'delivery_address'];




    public function get_stockist_orders(User $user)
    {
        return $this->where('store_id', $user->username );
    }
}
