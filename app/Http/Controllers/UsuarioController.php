<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\endereco_usuario;
use App\familia_usuario;
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

        return view('cadastro.index', ['usuarios' => $usuarios]);
    }

    public function detalheEndereco($id){
        $endereco = endereco_usuario::where('id_usuario', $id)->first();
        return view('cadastro.detalhe-endereco', ['endereco' => $endereco]);
    }

    public function create()
    {
        return view ('cadastro.formulario');
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

            return redirect()->route('formulario.endereco', ['id' => $usuario->id]);
        }
        return redirect()->route('home');
    }

    public function formularioEndereco($id){
        return view('cadastro.endereco', ['id' => $id]);
    }

    public function storeEndereco(Request $request)
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

            return redirect()->route('formulario.familia', ['id' => $endereco->id_usuario]);
        }
        return redirect()->route('home');
    }

    public function formularioFamilia($id){
        return view('cadastro.familia', ['id' => $id]);
    }

    public function storeFamilia(Request $request)
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

        usuario::where('publicado', 0)->update(['publicado' => 1]);

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

    /*  FIM :: MÉTODOS CRUD*/

    public function hasInput(Request $request){
        return count($request->all()) > 0;
    }
}
