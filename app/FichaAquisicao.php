<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FichaAquisicao extends Model
{
    protected $table = 'fichas_aquisicoes';

    public function getStatus() {
        return $this->ativa() ? 'Ativa' : 'Inatíva';
    }

    public function ativa(){
        $hj = date('Y-m-d');
        return $this->data_criacao <= $hj && $hj <= $this->valido_ate;
    }
}
