    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\endereco_usuario;
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
        $usuarios = usuario::all();

        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view ('usuarios.create');
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome-completo');
        if($nome != '')
        {
            $usuario = new usuario();
            $usuario->nome = $nome;
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
            $usuario->cras = $request->input('cras') != null ? true : false;
            $usuario->num_cad = $request->input('cad-unico');
            $usuario->medicamentos = $request->input('medicamentos');
            $usuario->alergias = $request->input('alergias');
            $usuario->descobriu_por = $request->input('descobriu-por');
            $usuario->observacao = $request->input('observacoes');
            $usuario->raca_cor = $request->input('raca-cor');
            $usuario->povo_tradicional = $request->input('povo-tradicional');
            $usuario->save();

            $endereco = new endereco_usuario();
            $endereco->id_usuario = $usuario->id;
            $endereco->logadouro = $request->input('logadouro');
            $endereco->numero = $request->input('numero');
            $endereco->complemento = $request->input('complemento');
            $endereco->bairro = $request->input('bairro');
            $endereco->cep = $request->input('cep');
            $endereco->cidade = $request->input('cidade');
            $endereco->uf = $request->input('uf');

            $endereco->save();

            return redirect('usuarios')->with('success', 'Usuário cadastrado com sucesso');
        }
        return redirect()->back()->with('error', 'Erro ao realizar o cadastro.');
    }

    public function show($id)
    {
        $usuario = usuario::find($id);
        $endereco = $usuario->endereco();
        return view('usuarios.show')->with('usuario', $usuario)
                                    ->with('endereco', $endereco);
    }

    public function edit($id)
    {
        $usuario = usuario::find($id);
        $endereco = $usuario->endereco();
        return view('usuarios.edit')->with('usuario', $usuario)
                                    ->with('endereco', $endereco);
    }

    public function update(Request $request, $id)
    {
        $usuario = usuario::find($id);
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
        $usuario->cras = $request->input('cras') != null ? true : false;
        $usuario->num_cad = $request->input('cad-unico');
        $usuario->medicamentos = $request->input('medicamentos');
        $usuario->alergias = $request->input('alergias');
        $usuario->descobriu_por = $request->input('descobriu-por');
        $usuario->observacao = $request->input('observacoes');
        $usuario->raca_cor = $request->input('raca-cor');
        $usuario->povo_tradicional = $request->input('povo-tradicional');
        $usuario->save();

        $endereco = $usuario->endereco();

        if($endereco != null){        
            $endereco->logadouro = $request->input('logadouro');
            $endereco->numero = $request->input('numero');
            $endereco->complemento = $request->input('complemento');
            $endereco->bairro = $request->input('bairro');
            $endereco->cep = $request->input('cep');
            $endereco->cidade = $request->input('cidade');
            $endereco->uf = $request->input('uf');

            $endereco->save();
        }

        return redirect('usuarios/'.$usuario->id)->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $usuario = usuario::findOrFail($id);
        $usuario->delete();
        return redirect('usuarios')->with('success', 'Usuário deletado com sucesso.');
    }
}
