<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresencaOficinaProjeto extends Model
{
    protected $table = 'presencas_oficinas_projetos';

    public function getMatricula () {
        return $this->belongsTo('App\MatriculaOficinaProjeto', 'id_matriculas')->first();
    }

    public function faltaSemJustificativa () {
        return !$this->estevePresente && ( $this->justificada == null || $this->justificada == false);
    }
}
