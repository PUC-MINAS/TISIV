<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\Aquisicao;
use App\FichaAquisicao;
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

        return redirect()->back()->with('success', 'Ficha criada com sucesso.');
    }

    public function show($idUsuario, $idFicha) {
        $usuario = usuario::find($idUsuario);
        $ficha = FichaAquisicao::find($idFicha);
    }
}
