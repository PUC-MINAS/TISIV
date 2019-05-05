<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
