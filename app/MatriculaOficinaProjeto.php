<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatriculaOficinaProjeto extends Model
{
    protected $table = 'matriculas_oficinas_projetos';

    function getUsuario () {
        return $this->belongsTo('App\usuario', 'id_usuario')->first();
    }

    function getTurma () {
        return $this->belongsTo('App\TurmaOficinaProjeto', 'id_turmas')->first();
    }

    public function concluir() {
        if( !$this->desistente() && !$this->concluiu() ) {
            $this->concluiu = true;
            $this->data_conclusao = date('Y-m-d');
            return true;
        }
        else return false;
    }

    public function desistir() {
        if( !$this->desistente() && !$this->concluiu() ) {
            $this->desistente = true;
            $this->data_desistencia = date('Y-m-d');
            return true;
        }
    }

    public function desistente() {
        return $this->desistente != null && $this->desistente;
    }

    public function concluiu() {
        return $this->concluiu != null && $this->concluiu;
    }
}
