<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriculaOficinaProjeto extends Model
{
    protected $table = 'matriculas_oficinas_projetos';

    function getUsuario () {
        return $this->belongsTo('App\usuario', 'id_usuario')->first();
    }
}
