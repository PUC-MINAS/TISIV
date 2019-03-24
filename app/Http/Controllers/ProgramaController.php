<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programa;
use App\Filial;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::all();
        return view('programas.index')->with('programas', $programas);
    } 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filiais = Filial::all();
        return view('programas.criar')->with('filiais', $filiais);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programa = new Programa();
        $programa->nome = $request->input('nome');
        $programa->objetivo = $request->input('objetivo');
        $programa->filiais_id = $request->input('filial');
        $programa->save();

        return redirect('programas');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programa = Programa::find($id);
        return view('programas.detalhe')->with('programa', $programa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filiais = Filial::all();
        $programa = Programa::find($id);
        return view('programas.editar')->with('programa', $programa)->with('filiais', $filiais);
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
        $programa = Programa::findOrFail($id);

        $programa->nome = $request->input('nome');
        $programa->objetivo = $request->input('objetivo');
        $programa->filiais_id = $request->input('filial');
        $programa->save();

        return redirect('programas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programa = Programa::find($id);
        $programa->delete();

        return redirect('programas');
    }
}
