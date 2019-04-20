<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\Enums\Escolaridade;
use App\Enums\FormaDivulgacao;
use App\Enums\RacaCor;
use App\Enums\PovoTradicional;
use App\Enums\EstadoCivil;
use DateTime;
use Auth;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = usuario::orderBy('dta_nasc', 'asc')->paginate(10);
        /*
            usuario::all('nome',
            'sexo', 'dta_nasc',
            'cpf', 'rg', 'certidao_nasc',
            EstadoCivil::getKey(estado_civil), Escolaridade::getKey(escolaridade),
            'profissao', 'telefone', 'num_wpp', 'contato_emerg', 'cras', 'num_cad',
            'medicamentos', 'alergias', FormaDivulgacao::getKey(descobriu_por),
            'observacao', RacaCor::getKey(raca_cor),
            PovoTradicional::getKey(povo_tradicional))->orderBy('dta_nasc','asc')->paginate(10);
        */
        return view('cadastro.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view ('cadastro.formulario');
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();
	    $usuario->nome = $request->input('nome-completo');
        $usuario->sexo = $request->input('sexo');
        $usuario->dta_nasc = $request->input('dta_nasc');
        $usuario->cpf = $request->input('cpf');
        $usuario->rg = $request->input('rg');
        $usuario->certidao_nasc = $request->input('certidao-nasc');
        $usuario->estado_civil = $request->input('estado-civil');
        $usuario->escolaridade = $request->input('escolaridade');
        $usuario->profissao = $request->input('profissao');
        $usuario->telefone = $request->input('telefone');
        $usuario->num_wpp = $request->input('whats-app');
        $usuario->contato_emerg = $request->input('contato-emergencial');

        /* Recupera valor da CheckBox do CRAS */
        $cras = $request->input('cras');
        $usuario->cras = ($cras == true) ? ($value = 1) : ($value = 0);
        /* Recupera valor da CheckBox do CRAS */

        $usuario->num_cad = $request->input('cad-unico');
        $usuario->medicamentos = $request->input('medicamentos');
        $usuario->alergias = $request->input('alergias');
        $usuario->descobriu_por = $request->input('descobriu-por');
        $usuario->observacao = $request->input('observacoes');
        $usuario->raca_cor = $request->input('raca-cor');
        $usuario->povo_tradicional = $request->input('povo-tradicional');
	    $usuario->save();
	    return redirect()->route('home');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
