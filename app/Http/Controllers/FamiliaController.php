<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\familia_usuario;
use Auth;

class FamiliaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($idUsuario){
        $familiares = familia_usuario::all();
        $usuario = usuario::find($idUsuario);
        return view('familiares.index')->with('usuario', $usuario)
                                       ->with('familiares', $familiares);
    }

    public function create($idUsuario){
        $usuario = usuario::find($idUsuario);
        return view('familiares.create')->with('usuario', $usuario);
    }

    public function show($idUsuario, $id){
        $usuario = usuario::find($idUsuario);
        $familiar = familia_usuario::find($id);
        return view('familiares.show')->with('familiar', $familiar)
                                      ->with('usuario', $usuario);
    }

    public function store($idUsuario, Request $request)
    {
        $familiar = new familia_usuario();
        $familiar->id_usuario = $request->input('id_usuario');
        $familiar->nome = $request->input('nome');
        $familiar->dta_nasc = $request->input('dta-nasc');
        $familiar->parentesco = $request->input('parentesco');
        $familiar->profissao = $request->input('profissao');

        $familiar->save();

        return redirect('usuarios/'.$idUsuario)->with('success', 'Familiar cadastrado com sucesso.');
    }

    public function edit($idUsuario, $id)
    {
        $usuario = usuario::find($idUsuario);
        $familiar = familia_usuario::find($id);
        return view('familiares.edit')->with('usuario', $usuario)
                                     ->with('familiar', $familiar);
    }

    public function update($idUsuario, $id, Request $request)
    {
        $familiar = familia_usuario::find($id);
        $familiar->nome = $request->input('nome');
        $familiar->dta_nasc = $request->input('dta-nasc');
        $familiar->parentesco = $request->input('parentesco');
        $familiar->profissao = $request->input('profissao');

        $familiar->save();

        return redirect('usuarios/'.$idUsuario.'/familiares/'.$id)->with('success', 'Familiar atualizado com sucesso.');
    }

    public function destroy($idUsuario, $id)
    {
        $familiar = familia_usuario::find($id);
        $familiar->delete();
        return redirect('usuarios/'.$idUsuario)->with('success', 'Familiar deletado com sucesso.');
    }
}
