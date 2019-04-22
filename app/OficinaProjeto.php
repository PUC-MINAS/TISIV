<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OficinaProjeto extends Model
{
    //
    protected $table = 'oficinas_projetos';

    function getProjeto() {        
        return $this->belongsTo('App\Projeto', 'id_projetos')->first();
    }

    function getTurma() {
        return $this->hasMany('App\TurmaOficinaProjeto', 'id_oficinas_projetos')->get();
    }
}
