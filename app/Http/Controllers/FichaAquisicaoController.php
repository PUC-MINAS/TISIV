<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;
use App\Aquisicao;
use App\FichaAquisicao;
use App\ItemFichaAquisicao;
use App\MatriculaOficinaProjeto;
use App\Enums\TipoAquisicao;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
use App\OficinaProjeto;
use App\Filial;

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

    public function graficoAquisicao($idOficina, $idTurma,$id){
        $primeiraCount = 0;
        $segundaCount = 0;
        $terceiraCount = 0;
        $quartaCount = 0;
        $quintaCount = 0;
        $quintaCount = 0;
        $sextaCount = 0;
        $setimaCount = 0;
        $oitavaCount = 0;
        $nonaCount = 0;
        $decimaCount = 0;
        $decimoPCount = 0;
        $decimoSCount = 0;
        $decimoTCount = 0;
        $decimoQCount = 0;
        $decimoQuiCount = 0;
        $decimoSexCount = 0;
        $decimoSetCount = 0;
        $decimoOitCount = 0;

        $usuarios=MatriculaOficinaProjeto::select('id_usuario')->where([['id_turmas', '=', $idTurma]])->get();
        $nomeTurma = OficinaProjeto::select('nome')->where([['id', '=', $idTurma]])->get();
        foreach($nomeTurma as $value=>$arrayNomeTurma)
        $nt= $arrayNomeTurma['nome'];
        foreach($usuarios as $value=>$arrayUsuarios){
            $idFichaAquisicao = FichaAquisicao::select('id')->where([['id_usuario', '=', $arrayUsuarios['id_usuario']]])->get();
            foreach($idFichaAquisicao as $value=>$fichaAquisicao){
                $primeira = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','1'], ['atende', '=','1']])->count();
                $primeiraCount = $primeiraCount + $primeira;
                $segunda = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','2'], ['atende', '=','1']])->count();
                $segundaCount = $segundaCount + $segunda;
                $terceira = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','3'], ['atende', '=','1']])->count();
                $terceiraCount = $terceiraCount + $terceira;
                $quarta = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','4'], ['atende', '=','1']])->count();
                $quartaCount = $quartaCount + $quarta;
                $quinta = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','5'], ['atende', '=','1']])->count();
                $quintaCount = $quintaCount + $quinta;
                $sexta = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','6'], ['atende', '=','1']])->count();
                $sextaCount = $sextaCount + $sexta;
                $setima = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','7'], ['atende', '=','1']])->count();
                $setimaCount = $setimaCount + $setima;
                $oitava = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','8'], ['atende', '=','1']])->count();
                $oitavaCount = $oitavaCount + $oitava;
                $nona = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','9'], ['atende', '=','1']])->count();
                $nonaCount = $nonaCount + $nona;
                $decima = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','10'], ['atende', '=','1']])->count();
                $decimaCount = $decimaCount + $decima;
                $decimoP = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','11'], ['atende', '=','1']])->count();
                $decimoPCount = $decimoPCount + $decimoP;
                $decimoS = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','12'], ['atende', '=','1']])->count();
                $decimoSCount = $decimoSCount + $decimoS;
                $decimoT = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','13'], ['atende', '=','1']])->count();
                $decimoTCount = $decimoTCount + $decimoT;
                $decimoQ = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','14'], ['atende', '=','1']])->count();
                $decimoQCount = $decimoQCount + $decimoQ;
                $decimoQui = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','15'], ['atende', '=','1']])->count();
                $decimoQuiCount = $decimoQuiCount + $decimoQui;
                $decimoSex = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','16'], ['atende', '=','1']])->count();
                $decimoSexCount = $decimoSexCount + $decimoSex;
                $decimoSet = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','17'], ['atende', '=','1']])->count();
                $decimoSetCount = $decimoSetCount + $decimoSet;
                $decimoOit = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','18'], ['atende', '=','1']])->count();
                $decimoOitCount = $decimoOitCount + $decimoOit;
            }
        }
         
          
        
        $lava = new Lavacharts;
        $aquisicoes = $lava->DataTable();
        $aquisicoes->addStringColumn('Lista Aquisições')
        ->addNumberColumn('Aquisições')
        ->addRow(['1', $primeiraCount])
        ->addRow(['2', $segundaCount])
        ->addRow(['3', $terceiraCount])
        ->addRow(['4', $quartaCount])
        ->addRow(['5', $quintaCount])
        ->addRow(['6', $sextaCount])
        ->addRow(['7', $setimaCount])
        ->addRow(['8', $oitavaCount])
        ->addRow(['9', $nonaCount])
        ->addRow(['10', $decimaCount])
        ->addRow(['11', $decimoPCount])
        ->addRow(['12', $decimoSCount])
        ->addRow(['13', $decimoTCount])
        ->addRow(['14', $decimoQCount])
        ->addRow(['15', $decimoQuiCount])
        ->addRow(['16', $decimoSexCount])
        ->addRow(['17', $decimoSetCount])
        ->addRow(['18', $decimoOitCount]);
        $nl=chr(10);
        $lava->BarChart('Dados', $aquisicoes, [
            'title' => ['Relatório de Aquisições - Indicadores do Usuário - Turma '.$nt],
            'titleTextStyle' => [
                'fontSize' => 20,
                'align' => 'center'
            ],
        ]);
        
        $data['filial'] = Filial::find(1);
        return view('fichas-aquisicoes.editRelatorio',$data)->with(compact('lava','primeiraCount',
        'segundaCount',
        'terceiraCount',
        'quartaCount',
        'quintaCount',
        'quintaCount',
        'sextaCount',
        'setimaCount',
        'oitavaCount',
        'nonaCount',
        'decimaCount',
        'decimoPCount',
        'decimoSCount',
        'decimoTCount',
        'decimoQCount',
        'decimoQuiCount',
        'decimoSexCount',
        'decimoSetCount',
        'decimoOitCount'))->with('tipo', 'BarChart');
    }    
}
