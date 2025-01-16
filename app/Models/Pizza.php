<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $table = 'pizzas';

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_pizza');
    }


}
