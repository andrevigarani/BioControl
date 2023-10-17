<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;

    public function pessoa()
    {
        return $this->morphOne(Pessoa::class, 'entidade');
    }
}
