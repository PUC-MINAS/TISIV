<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OficinaProjeto extends Model
{
    //
    protected $table = 'oficinas_projetos';

    function getProjeto() {        
        return $this->belongsTo('App\Projeto', 'id_projetos')->first();
    }
}
