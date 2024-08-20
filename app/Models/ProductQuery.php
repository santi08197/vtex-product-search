<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuery extends Model
{
    use HasFactory;

    protected $table = 'consulta_productos';

    protected $fillable = ['nombre', 'resultados'];

}
