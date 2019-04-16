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

    function criarListaPresenca ($idOficina, $idTurma) {
        $oficina = OficinaProjeto::find($idOficina);
        $turma = TurmaOficinaProjeto::find($idTurma);
        return view('turma-oficina-projeto.criar-lista-presenca')->with('turma', $turma);
    }
}
