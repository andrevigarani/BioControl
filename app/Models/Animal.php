<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';

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

    // Relacionamento com a tabela de espécies
    public function pessoa_fisica()
    {
        return $this->belongsTo(PessoaFisica::class, 'id_responsavel_animal');
    }

}
