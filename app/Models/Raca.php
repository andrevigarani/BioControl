<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'nome',
        'id_especie',
    ];

    // Relacionamento com a tabela de espécies
    public function especie()
    {
        return $this->belongsTo(Especie::class, 'id_especie');
    }

}
