<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    

    function getPrograma(){
        return $this->belongsTo('App\Programa', 'id_programas')->first();
    }
}
