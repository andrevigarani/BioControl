<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rua extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rua';
    protected $fillable = [
        'nome_rua',
        '_token',
        'id_bairro'
    ];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class, 'id_bairro');
    }   
}
