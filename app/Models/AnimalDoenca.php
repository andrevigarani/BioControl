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
        'data_cura',
    ];

    public function doenca()
    {
        return $this->belongsTo(Doenca::class, 'id_doenca');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal');
    }
}
