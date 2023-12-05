<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicaVeterinaria extends Model
{
    use HasFactory;
    protected $table = 'clinicas_veterinarias';
    protected $fillable = [
        'id_pessoa_juridica',
    ];

    // Define the relationship with PessoaJuridica
    public function pessoaJuridica()
    {
        return $this->belongsTo(PessoaJuridica::class, 'id_pessoa_juridica');
    }

    public function rua()
    {
        return $this->belongsTo(Rua::class, 'id_rua');
    }
}
