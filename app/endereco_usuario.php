<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class endereco_usuario extends Model
{
    protected $table = 'endereco_usuario';
    protected $fillable = [
        'rua', 'numero', 'apto',
        'bairro', 'cep', 'cidade',
        'estado', 'nacionalidade'
    ];

    public function usuario(){
        return $this->belongsTo('App\usuario', 'usuario_id');
    }
}
