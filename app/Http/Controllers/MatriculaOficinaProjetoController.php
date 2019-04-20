<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TurmaOficinaProjeto;
use App\OficinaProjeto;
use App\usuario;

class MatriculaOficinaProjetoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($idOficina, $idTurma) {
        $oficina = OficinaProjeto::find($idOficina);
        $turma = TurmaOficinaProjeto::find($idTurma);

        return view('matriculas-oficinas-projetos.index')->with('oficina', $oficina)
                     ->with('turma', $turma);
    }

    public function create($idOficina) {
        $oficina = OficinaProjeto::find($idOficina);
        $turmas = TurmaOficinaProjeto::all();
        $usuarios = usuario::all();

        return view('matriculas-oficinas-projetos.create')->with('oficina', $oficina)
                                                          ->with('turmas', $turmas)
                                                          ->with('usuarios', $usuarios);
    }

    public function store($idOficina, $idTurma, Request $request) {

    }

}
