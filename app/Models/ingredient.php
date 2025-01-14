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
}
