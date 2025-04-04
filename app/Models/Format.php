<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{

    use HasFactory;

    protected $table = 'formats';

    protected $fillable = [
        'size',
        'price',
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_format');
    }

}
