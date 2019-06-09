<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuscaAtiva extends Model
{
    protected $table = 'buscas_ativas';
    protected $primarykey = 'id';

    protected $fillable = [
        'observacao'
    ];
}
