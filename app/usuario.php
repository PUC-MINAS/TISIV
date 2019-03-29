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
}
