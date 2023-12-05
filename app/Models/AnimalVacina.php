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
        'data_aplicacao',
    ];

    public function vacina()
    {
        return $this->belongsTo(Vacina::class, 'id_vacina');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal');
    }
}
