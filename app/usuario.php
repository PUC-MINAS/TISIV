<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Sexo;
use App\Enums\Escolaridade;

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
        return $this->hasOne('App\endereco_usuario', 'id_usuario')->first();
    }

    public function getFamiliares(){
        return $this->hasMany('App\familia_usuario', 'id_usuario')->get();
    }

    public function qtdFamiliares() {
        return count($this->getFamiliares());
    }

    public function getFichasAquisicoes() {
        return $this->hasMany('App\FichaAquisicao', 'id_usuario')->orderBy('data_criacao', 'desc')->get();
    }

    public function temFichaAtiva() {
        $hj = date('Y-m-d');
        $fichasAtivas = $this->hasMany('App\FichaAquisicao', 'id_usuario')
                             ->where('valido_ate', '>=', $hj)
                             ->where('data_criacao', '<=', $hj)
                             ->get();

        return count($fichasAtivas) > 0;
    }

    public function getSexo () {
        return Sexo::getDescription($this->sexo);
    }

    public function getEscolaridade() {
        return Escolaridade::getDescription($this->escolaridade);
    }

    public function getIdade() {
        if($this->dta_nasc == null){
            return $this->dta_nasc;
        }
        else {
            $nascimento = strtotime($this->dta_nasc);
            $hoje = strtotime(date('Y-m-d'));
            $idade = floor( (($hoje - $nascimento) / 60 / 60 / 24 / 365.25) );
            return $idade;
        }
    }
}
