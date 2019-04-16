<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;

class TurmaOficinaProjetoController extends Controller
{
    function criarListaPresenca ($idOficina, $idTurma) {
        $oficina = OficinaProjeto::find($idOficina);
        $turma = TurmaOficinaProjeto::find($idTurma);
        dd($turma);
        return view('turma-oficina-projeto.criar')->with('turma', $turma);
    }
}
