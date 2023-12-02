<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalDoenca extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_animal',
        'id_doenca',
        'data_inicio',
    ];

}
