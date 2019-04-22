<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\endereco_usuario;
use Auth;

class EnderecoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id){
        $endereco = endereco_usuario::where('id_usuario', $id)->get();
        $usuario = usuario::where('id', $id)->first();
        return view('endereco.index', ['id' => $usuario->id, 'nome' => $usuario->nome, 'endereco' => $endereco]);
    }

    public function formulario($id){
        return view('endereco.formulario', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $rua = $request->input('rua');
        if($rua != '')
        {

            $endereco = new endereco_usuario();
            $endereco->id_usuario = $request->input('usuario-id');
            $endereco->rua = $rua;
            $endereco->numero = $request->input('numero');
            $endereco->apto = $request->input('apto');
            $endereco->bairro = $request->input('bairro');
            $endereco->cep = $request->input('cep');
            $endereco->cidade = $request->input('cidade');
            $endereco->uf = $request->input('uf');
            $endereco->nacionalidade = $request->input('nacionalidade');
            $endereco->save();

            return redirect()->route('familia.formulario', ['id' => $endereco->id_usuario]);
        }
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $endereco = endereco_usuario::findOrFail($id);
        return view('endereco.alterar', ['endereco' => $endereco]);
    }

    public function update(Request $request, $id)
    {
       $endereco = endereco_usuario::findOrFail($id);

       $endereco->rua = $request->input('rua');
       $endereco->numero = $request->input('numero');
       $endereco->apto = $request->input('apto');
       $endereco->bairro = $request->input('bairro');
       $endereco->cep = $request->input('cep');
       $endereco->cidade = $request->input('cidade');
       $endereco->uf = $request->input('uf');
       $endereco->nacionalidade = $request->input('nacionalidade');

       $endereco->save();
       return redirect()->route('endereco.index', ['id' => $endereco->id_usuario]);
    }

    public function destroy($id)
    {
        $endereco = endereco_usuario::where('id_usuario', $id);
        $endereco->delete();
        return redirect()->route('endereco.index', ['id' => $id]);
    }
}
