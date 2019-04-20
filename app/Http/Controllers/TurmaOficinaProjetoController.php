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
    public function create()
    {
        $oficinas = OficinaProjeto::all();
        return view('turma-oficina-projeto.create')->with('oficinas', $oficinas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $turma = new TurmaOficinaProjeto();
        $turma->id_oficinas_projetos = $request->input('oficina');
        $turma->educador = $request->input('educador');
        $turma->horario = $request->input('horario');
        $turma->maximoAlunos = $request->input('maximoAlunos');
        $turma->idadeMinima = $request->input('idadeMinima');
        $turma->idadeMaxima = $request->input('idadeMaxima');
        $turma->save();

        return redirect('turma-oficina-projeto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $turma = TurmaOficinaProjeto::find($id);
        return view('turma-oficina-projeto.show')->with('turma', $turma);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $turma = TurmaOficinaProjeto::find($id);
        $oficinas = OficinaProjeto::all();
        return view('turma-oficina-projeto.edit')->with('turma', $turma)
                                    ->with('oficinas', $oficinas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $turma = TurmaOficinaProjeto::find($id);
        $turma->id_oficinas_projetos = $request->input('oficina');
        $turma->educador = $request->input('educador');
        $turma->horario = $request->input('horario');
        $turma->maximoAlunos = $request->input('maximoAlunos');
        $turma->idadeMinima = $request->input('idadeMinima');
        $turma->idadeMaxima = $request->input('idadeMaxima');
        $turma->save();

        return redirect('turma-oficina-projeto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TurmaOficinaProjeto  $turmaOficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $turma = TurmaOficinaProjeto::destroy($id);
        return redirect('turma-oficina-projeto');
    }
}
