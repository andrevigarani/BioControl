<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';

    use HasFactory;

    protected $fillable = [
        'nome',
        'nascimento',
        'falecimento',
        'castracao',
        'id_raca',
        'id_chip',
        'id_abrigo',
        'id_clinica_veterinaria',
        'id_responsavel_animal',
    ];
}
