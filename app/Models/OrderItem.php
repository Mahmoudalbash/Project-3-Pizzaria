<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'pizza_id',
        'format_id',
        'ingredients',
        'quantity',
        'price',
    ];

}
