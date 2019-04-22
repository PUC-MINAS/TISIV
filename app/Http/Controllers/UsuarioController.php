<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use DateTime;
use Auth;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*  INÍCIO :: MÉTODOS CRUD */

    public function index()
    {
        $usuarios = usuario::orderBy('dta_nasc', 'asc')->paginate(10);

        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view ('usuarios.formulario');
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome-completo');
        if($nome != '')
        {

            $usuario = new Usuario();
            $usuario->nome = $nome;
            $usuario->sexo = $request->input('sexo');
            $dataNascimento = $request->input('dta_nasc');
            $usuario->dta_nasc = $dataNascimento != null ? ($dataNascimento) : ('1899-12-31');
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
            $usuario->publicado = 0;
            $usuario->save();

            return redirect()->route('endereco.formulario', ['id' => $usuario->id]);
        }
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
        $usuario = usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('home');
    }
}
