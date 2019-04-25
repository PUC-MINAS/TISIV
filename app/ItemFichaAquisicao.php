<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ItemFichaAquisicao extends Model
{
    protected $table = 'itens_fichas_aquisicoes';
    protected $primaryKey = ['id_aquisicoes', 'id_fichas_aquisicoes'];
    public $incrementing = false;

    public function getAquisicao(){
        return $this->belongsTo('App\Aquisicao', 'id_aquisicoes')->first();
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id_aquisicoes', '=', $this->getAttribute('id_aquisicoes'))
            ->where('id_fichas_aquisicoes', '=', $this->getAttribute('id_fichas_aquisicoes'));
        return $query;
    }
}
