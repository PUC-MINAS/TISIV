<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;

class TurmaOficinaProjetoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

}
