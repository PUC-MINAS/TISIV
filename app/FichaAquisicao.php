<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\TipoAquisicao;

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

    public function getItens(){
        return $this->hasMany('App\ItemFichaAquisicao', 'id_fichas_aquisicoes')->get();
    }

    public function getItensIndicadoresUsuarios(){
        return $this->getItens()->filter(function ($value, $key){
            return $value->getAquisicao()->tipo_aquisicao == TipoAquisicao::IndicadorUsuario;
        });
    }

    public function getItensIndicadoresFamiliares(){
        return $this->getItens()->filter(function ($value, $key){
            return $value->getAquisicao()->tipo_aquisicao == TipoAquisicao::IndicadorFamiliares;
        });
    }
}
