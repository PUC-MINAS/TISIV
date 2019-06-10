<?php

namespace App\Http\Controllers;

use App\User;
use App\usuario;
use App\BuscaAtiva;
use Illuminate\Http\Request;
use App\Enums\StatusBuscaAtiva;

class BuscaAtivaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $buscasAtivas = BuscaAtiva::whereNull('data_conclusao')->get()->unique('id_usuario');

        $idBeneficiados = $buscasAtivas->pluck('id_usuario');
        $idResponsaveis = $buscasAtivas->pluck('id_users');

        $beneficiados = usuario::whereIn('id', $idBeneficiados)->get('nome');

        /*
           Dois beneficiados podem ter o mesmo responsável por sua busca ativa,
           portanto, o laravel retorna um erro de offset ao tentar acessar a posição
           da coleção de responsáveis

           Corrigir isso.
        */
        $responsaveis = User::whereIn('id', $idResponsaveis)->get('name');

        return view('busca-ativa.detalhes', [
            'tamanho' => count($buscasAtivas),
            'dadosBA' => $buscasAtivas,
            'beneficiados' => $beneficiados,
            'responsaveis' => $responsaveis
        ]);

    }

    public function concluir(Request $request)
    {
        $buscaAtiva = BuscaAtiva::find($request->idBusca);
        $buscaAtiva->observacao = $request->observacao;
        $buscaAtiva->status = StatusBuscaAtiva::Concluida;
        $buscaAtiva->data_conclusao = date('Y-m-d');
        $buscaAtiva->save();

        return redirect()->route('busca-ativa');
    }
}
