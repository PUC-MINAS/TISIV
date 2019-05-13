<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programas';

    function getFilial(){
        return $this->belongsTo('App\Filial', 'id_filiais')->first();
    }
}
