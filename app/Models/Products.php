<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $casts=[
        'items' => 'array'
    ];
    protected $fillable = [
        'name', 'qtd', 'description', 'categoria','image','items'
    ];
    
}
