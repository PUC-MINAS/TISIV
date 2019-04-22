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

    public function index($id){
        $familia = familia_usuario::where('id_usuario', $id)->get();
        $usuario = usuario::where('id', $id)->first();
        return view('familia.index', ['id' => $usuario->id, 'nome' => $usuario->nome, 'familia' => $familia]);
    }

    public function formulario($id){
        return view('familia.formulario', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $usuario_id = $request->input('usuario-id');

        $nome1 = $request->input('nome1');
        if ($nome1 != '')
        {

            $parente_1 = new familia_usuario();
            $parente_1->id_usuario = $usuario_id;
            $parente_1->nome_parente = $nome1;
            $parente_1->parentesco = $request->input('parentesco1');
            $parente_1->dta_nasc = $request->input('dta-nasc1');
            $parente_1->profissao = $request->input('profissao1');
            $parente_1->save();

        }

        $nome2 = $request->input('nome2');
        if($nome2 != ''){
            $parente_2 = new familia_usuario();
            $parente_2->id_usuario = $usuario_id;
            $parente_2->nome_parente = $nome2;
            $parente_2->parentesco = $request->input('parentesco2');
            $parente_2->dta_nasc = $request->input('dta-nasc2');
            $parente_2->profissao = $request->input('profissao2');
            $parente_2->save();
        }

        $nome3 = $request->input('nome3');
        if($nome3 != ''){
            $parente_3 = new familia_usuario();
            $parente_3->id_usuario = $usuario_id;
            $parente_3->nome_parente = $nome3;
            $parente_3->parentesco = $request->input('parentesco3');
            $parente_3->dta_nasc = $request->input('dta-nasc3');
            $parente_3->profissao = $request->input('profissao3');
            $parente_3->save();
        }

        $nome4 = $request->input('nome4');
        if($nome4 != ''){
            $parente_4 = new familia_usuario();
            $parente_4->id_usuario = $usuario_id;
            $parente_4->nome_parente = $nome4;
            $parente_4->parentesco = $request->input('parentesco4');
            $parente_4->dta_nasc = $request->input('dta-nasc4');
            $parente_4->profissao = $request->input('profissao4');
            $parente_4->save();
        }

        $nome5 = $request->input('nome5');
        if($nome5 != ''){
            $parente_5 = new familia_usuario();
            $parente_5->id_usuario = $usuario_id;
            $parente_5->nome_parente = $nome5;
            $parente_5->parentesco = $request->input('parentesco5');
            $parente_5->dta_nasc = $request->input('dta-nasc5');
            $parente_5->profissao = $request->input('profissao5');
            $parente_5->save();
        }

        usuario::where('id', $usuario_id)->update(['publicado' => 1]);

        return redirect()->route('home');
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $familia = familia_usuario::where('id_usuario', $id);
        $familia->delete();
        return redirect()->route('familia.index', ['id' => $id]);
    }
}
