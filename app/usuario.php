<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = 'usuario';
    protected $fillable = [
        'nome', 'sexo',
        'dta_nasc', 'cpf',
        'rg','certidao_nasc',
        'estado_civil','escolaridade',
        'profissao','telefone',
        'num_wpp','contato_emerg',
        'cras','num_cad',
        'medicamentos','alergias',
        'descobriu_por','observacao',
        'raca_cor','povo_tradicional'
    ];
    protected $dates = ['dta_nasc', 'created_at', 'updated_at'];
    protected $primarykey = 'id';

    public function endereco(){
        return $this->hasOne('App\endereco_usuario', 'usuario_id');
    }

    public function familia(){
        return $this->hasOne('App\familia_usuario', 'usuario_id');
    }

    public function getFichasAquisicoes() {
        return $this->hasMany('App\FichaAquisicao', 'id_usuario')->get();
    }

    public function temFichaAtiva() {
        $hj = date('Y-m-d');
        $fichasAtivas = $this->hasMany('App\FichaAquisicao', 'id_usuario')
                             ->where('valido_ate', '>=', $hj)
                             ->where('data_criacao', '<=', $hj)
                             ->get();

        return count($fichasAtivas) > 0;
    }
}
