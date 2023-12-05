<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;
    
    protected $table = 'pessoas_juridicas';

    protected $fillable = [
        'cnpj',
        'razao_social',
        'nome_fantasia',
        'fone',
        'email',
        'numero_endereco',
        'complemento',
        'id_rua',
        'id_pessoa_fisica',
    ];

    public function pessoa()
    {
        return $this->morphOne(Pessoa::class, 'entidade');
    }

    public function pessoaFisica()
    {
        return $this->belongsTo(PessoaFisica::class, 'id_pessoa_fisica');
    }

    public function rua()
    {
        return $this->belongsTo(Rua::class, 'id_rua');
    }
}
