<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCartOr extends Model
{
  protected $fillable = [
        'customer_order_id',
        'product_name',
        'quantity',
        'price',
        'total',
    ];

    // علاقة العنصر بالطلب
    public function order()
    {
        return $this->belongsTo(CustomerCart::class);
    }
}
