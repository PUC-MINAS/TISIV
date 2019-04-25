<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\Aquisicao;
use App\FichaAquisicao;
use App\ItemFichaAquisicao;
use App\Enums\TipoAquisicao;

class FichaAquisicaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($idUsuario) {
        $usuario = usuario::find($idUsuario);

        return view('fichas-aquisicoes.index')->with('usuario', $usuario);
    }

    public function store($idUsuario) {
        $ficha = new FichaAquisicao();
        $ficha->data_criacao = date('Y-m-d');
        $ficha->valido_ate = date('Y-m-d', strtotime('+6 month'));
        $ficha->id_usuario = $idUsuario;        

        $ficha->save();

        $aquisicoes = Aquisicao::all();

        foreach($aquisicoes as $aquisicao){
            $item = new ItemFichaAquisicao();
            $item->id_aquisicoes = $aquisicao->id;
            $item->id_fichas_aquisicoes = $ficha->id;
            $item->save();
        }

        return redirect()->back()->with('success', 'Ficha criada com sucesso.');
    }

    public function show($idUsuario, $idFicha) {
        $usuario = usuario::find($idUsuario);
        $ficha = FichaAquisicao::find($idFicha);
        $fichaAtiva = $ficha->ativa();

        if($fichaAtiva) {
            return view('fichas-aquisicoes.edit')->with('usuario', $usuario)
                                           ->with('ficha', $ficha)
                                           ->with('fichaAtiva', $fichaAtiva);
        }
        else {
            return view('fichas-aquisicoes.show')->with('usuario', $usuario)
                                           ->with('ficha', $ficha)
                                           ->with('fichaAtiva', $fichaAtiva);
        }
    }

    public function update($idUsuario, $idFicha, Request $request){
        $ficha = FichaAquisicao::find($idFicha);
        
        foreach($ficha->getItens() as $item) {
            $item->atende = $request['aquisicao'.$item->id_aquisicoes] != null ? true : false;
            $item->save();
        }

        return redirect()->back()->with('success', 'Ficha salva com sucesso');
    }
}
