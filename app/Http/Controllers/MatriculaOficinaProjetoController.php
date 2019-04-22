<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TurmaOficinaProjeto;
use App\OficinaProjeto;
use App\usuario;
use App\MatriculaOficinaProjeto;

class MatriculaOficinaProjetoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function jaMatriculado (MatriculaOficinaProjeto $matricula) {
        $matriculaExistente = MatriculaOficinaProjeto::where('id_usuario', $matricula->id_usuario)
                                                     ->where('id_turmas', $matricula->id_turmas )->get();
        return count($matriculaExistente) > 0;
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

    public function store($idOficina, Request $request) {
        $matricula = new MatriculaOficinaProjeto();
        $matricula->data_matricula = date('Y-m-d');
        $matricula->id_turmas = $request['turma'];
        $matricula->id_usuario = $request['usuario'];

        if( $this->jaMatriculado($matricula) ){
            $error = 'O usuário "'.$matricula->getUsuario()->nome.'" já possui matrícula na turma s'.$matricula->getTurma()->nome().'.';
            return redirect()->back()->with('error', $error);
        }
        else {
            $matricula->save();
            return redirect('oficinas-projetos/'.$idOficina.'/turmas/'.$matricula->id_turmas.'/matriculas');
        }
        

    }

    public function show($idOficina, $idTurma, $idMatricula) {
        $oficina = OficinaProjeto::find($idOficina);
        $matricula = MatriculaOficinaProjeto::find($idMatricula);

        return view('matriculas-oficinas-projetos.show')->with('oficina', $oficina)
                                                        ->with('matricula', $matricula);
    }

    public function destroy ($idOficina, $idTurma, $idMatricula) {

        $matriculas = MatriculaOficinaProjeto::destroy($idMatricula);
        return redirect('oficinas-projetos/'.$idOficina.'/turmas/'.$idTurma.'/matriculas');
    }

    

}
