<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalVacina extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_animal',
        'id_vacina',
    ];

}
