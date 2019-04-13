<?php

namespace App\Http\Controllers;

use App\OficinaProjeto;
use App\Projeto;
use Illuminate\Http\Request;

class OficinaProjetoController extends Controller
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
        $oficinas = OficinaProjeto::all();
        return view('oficinas-projetos.index')->with('oficinas', $oficinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projetos = Projeto::all();
        return view('oficinas-projetos.create')->with('projetos', $projetos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina = new OficinaProjeto();
        $oficina->nome = $request['nome'];
        $oficina->id_projetos = $request['projeto'];
        $oficina->local = $request['local'];
        $oficina->cargaHoraria = $request['cargaHoraria'];
        $oficina->percentualMinimoFrequencia = $request['percentualMinimoFrequencia'];
        $oficina->inicio = $request['inicio'];
        $oficina->fim = $request['fim'];
        $oficina->ementa = $request['ementa'];

        $oficina->save();

        return redirect('oficinas-projetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oficina = OficinaProjeto::find($id);
        return view('oficinas-projetos.show')->with('oficina', $oficina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina = OficinaProjeto::find($id);
        $projetos = Projeto::all();
        return view('oficinas-projetos.edit')->with('oficina', $oficina)
                                             ->with('projetos', $projetos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oficina = OficinaProjeto::find($id);
        $oficina->nome = $request['nome'];
        $oficina->id_projetos = $request['projeto'];
        $oficina->local = $request['local'];
        $oficina->cargaHoraria = $request['cargaHoraria'];
        $oficina->percentualMinimoFrequencia = $request['percentualMinimoFrequencia'];
        $oficina->inicio = $request['inicio'];
        $oficina->fim = $request['fim'];
        $oficina->ementa = $request['ementa'];

        $oficina->save();
        return redirect('oficinas-projetos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oficina = OficinaProjeto::destroy($id);
        return redirect('oficinas-projetos');
    }
}
