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

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = TurmaOficinaProjeto::all();
        return view('turma-oficina-projeto.index')->with('turmas', $turmas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idOficina)
    {
        $oficina = OficinaProjeto::find($idOficina);
        return view('turma-oficina-projeto.create')->with('oficina', $oficina);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idOficina, Request $request)
    {
        
        $turma = new TurmaOficinaProjeto();
        $turma->id_oficinas_projetos = $idOficina;
        $turma->educador = $request->input('educador');
        $turma->horario = $request->input('horario');
        $turma->maximoAlunos = $request->input('maximoAlunos');
        $turma->idadeMinima = $request->input('idadeMinima');
        $turma->idadeMaxima = $request->input('idadeMaxima');
        $turma->save();

        return redirect('oficinas-projetos/'.$idOficina);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function show($idOficina, $idTurma)
    {
        $oficina = OficinaProjeto::find($idOficina);
        $turma = TurmaOficinaProjeto::find($idTurma);
        return view('turma-oficina-projeto.show')->with('turma', $turma)->with('oficina', $oficina);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function edit($idOficina, $idTurma)
    {
        $turma = TurmaOficinaProjeto::find($idTurma);
        $oficina = OficinaProjeto::find($idOficina);
        return view('turma-oficina-projeto.edit')->with('turma', $turma)
                                                 ->with('oficina', $oficina);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function update($idOficina, $idTurma, Request $request)
    {

        $turma = TurmaOficinaProjeto::find($idTurma);
        $turma->educador = $request->input('educador');
        $turma->horario = $request->input('horario');
        $turma->maximoAlunos = $request->input('maximoAlunos');
        $turma->idadeMinima = $request->input('idadeMinima');
        $turma->idadeMaxima = $request->input('idadeMaxima');
        $turma->save();

        return redirect('oficinas-projetos/'.$idOficina.'/turmas/'.$idTurma);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($idOficina, $idTurma)
    {        
        $turma = TurmaOficinaProjeto::destroy($idTurma);
        return redirect('oficinas-projetos/'.$idOficina);
    }
}
