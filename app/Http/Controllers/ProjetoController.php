<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Programa;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = Projeto::all();
        return view('projetos.index')->with('projetos', $projetos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::all();
        return view('projetos.create')->with('programas', $programas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projeto = new Projeto();
        $projeto->nome = $request->input('nome');
        $projeto->id_programas = $request->input('programa');
        $projeto->objetivo = $request->input('objetivo');
        $projeto->descricao = $request->input('descricao');
        $projeto->inicio = date($request->input('inicio'));
        $projeto->fim = date($request->input('fim'));
        $projeto->save();
        return redirect('projetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = Projeto::find($id);
        return view('projetos.show')->with('projeto', $projeto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = Projeto::find($id);
        $programas = Programa::all();
        return view('projetos.edit')->with('projeto', $projeto)
                                    ->with('programas', $programas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projeto = Projeto::find($id);
        $projeto->nome = $request->input('nome');
        $projeto->id_programas = $request->input('programa');
        $projeto->objetivo = $request->input('objetivo');
        $projeto->descricao = $request->input('descricao');
        $projeto->inicio = date($request->input('inicio'));
        $projeto->fim = date($request->input('fim'));
        $projeto->save();
        return redirect('projetos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projeto = Projeto::destroy($id);
        return redirect('projetos');
    }
}
