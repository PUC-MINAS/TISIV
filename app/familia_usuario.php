<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class familia_usuario extends Model
{
    protected $table = 'familia_usuario';
    protected $fillable = [
        'nome_parente', 'parentesco',
        'dta_nasc', 'profissao'
    ];
}
