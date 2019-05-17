<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Parentesco;

class familia_usuario extends Model
{
    protected $table = 'familia_usuario';
    protected $fillable = [
        'nome_parente', 'parentesco',
        'dta_nasc', 'profissao'
    ];
    protected $primarykey = 'id';

    public function usuario(){
        return $this->belongsTo('App\usuario', 'usuario_id');
    }

    public function getParentesco(){
        return Parentesco::getDescription($this->parentesco);
    }

    public function getIdade() {

        if($this->dta_nasc == null){
            return $this->dta_nasc;
        }
        else {
            // list($ano, $mes, $dia) = explode('-', $this->dta_nasc);
            $nascimento = strtotime($this->dta_nasc);
            $hoje = strtotime(date('Y-m-d'));
            $idade = floor( (($hoje - $nascimento) / 60 / 60 / 24 / 365.25) );
            return $idade;
        }
    }
}
