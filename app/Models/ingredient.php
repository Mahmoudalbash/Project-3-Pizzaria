<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ingredient extends Model
{
    protected $table = 'ingredients';

    protected $fillable = [
        'name',
        'price',
        'ingredient_id',
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'ingredient_pizza');
    }
}
