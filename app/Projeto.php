<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    

    function getPrograma(){
        return Programa::find($this->programas_id);
    }
}
