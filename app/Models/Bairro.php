<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bairro';
    protected $fillable = [
        'nome_bairro',
        'id_municipio',
        '_token',
    ];
}
