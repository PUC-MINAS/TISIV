<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaOficinaProjeto extends Model
{
    protected $table = 'turmas_oficinas_projetos';

    function getOficina() {
        return $this->belongsTo('App\OficinaProjeto', 'id_oficinas_projetos')->first();
    }

    function getMatriculas() {
        return $this->hasMany('App\MatriculaOficinaProjeto', 'id_turmas')->get();
    }

    function getPresencas() {
        return $this->hasMany('App\PresencaOficinaProjeto', 'id_turmas')->get();
    }

    function getListasDePresencas() {
        return $this->hasMany('App\PresencaOficinaProjeto', 'id_turmas')->get('data')->unique('data')->values();
    }
}
