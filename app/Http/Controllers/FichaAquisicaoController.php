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
        $decimoNonoCount = 0;
        $vigesimoCount = 0;
        $vigesimoPCount = 0;
        $vigesimoSCount = 0;
        $vigesimoTCount = 0;
        $vigesimoQCount = 0;
        $vigesimoQuiCount = 0;
        $vigesimoSexCount = 0;
        $vigesimoSetCount = 0;
        $vigesimoOitCount = 0;
        $vigesimoNonoCount = 0;
        $trigesimoCount = 0;

        $usuarios=MatriculaOficinaProjeto::select('id_usuario')->where([['id_turmas', '=', $idTurma]])->get();
        $nomeTurma = OficinaProjeto::select('nome')->where([['id', '=', $idTurma]])->get();
        $data['oficina'] = OficinaProjeto::find($idOficina);
        $data['nome'] = $data['oficina']->nome;
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
                $decimoNono = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','19'], ['atende', '=','1']])->count();
                $decimoNonoCount = $decimoNonoCount + $decimoNono;
                $vigesimo = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','20'], ['atende', '=','1']])->count();
                $vigesimoCount = $vigesimoCount + $vigesimo;
                $vigesimoP = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','21'], ['atende', '=','1']])->count();
                $vigesimoPCount = $vigesimoPCount + $vigesimoP;
                $vigesimoS = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','22'], ['atende', '=','1']])->count();
                $vigesimoSCount = $vigesimoSCount + $vigesimoS;
                $vigesimoT = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','23'], ['atende', '=','1']])->count();
                $vigesimoTCount = $vigesimoTCount + $vigesimoT;
                $vigesimoQ = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','24'], ['atende', '=','1']])->count();
                $vigesimoQCount = $vigesimoQCount + $vigesimoQ;
                $vigesimoQui = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','25'], ['atende', '=','1']])->count();
                $vigesimoQuiCount = $vigesimoQuiCount + $vigesimoQui;
                $vigesimoSex = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','26'], ['atende', '=','1']])->count();
                $vigesimoSexCount = $vigesimoSexCount + $vigesimoSex;
                $vigesimoSet = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','27'], ['atende', '=','1']])->count();
                $vigesimoSetCount = $vigesimoSetCount + $vigesimoSet;
                $vigesimoOit = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','28'], ['atende', '=','1']])->count();
                $vigesimoOitCount = $vigesimoOitCount + $vigesimoOit;
                $vigesimoNono = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','29'], ['atende', '=','1']])->count();
                $vigesimoNonoCount = $vigesimoNonoCount + $vigesimoNono;
                $trigesimo = ItemFichaAquisicao::where([['id_fichas_aquisicoes', '=', $fichaAquisicao['id']], ['id_aquisicoes','=','30'], ['atende', '=','1']])->count();
                $trigesimoCount = $trigesimoCount + $trigesimo;
            }
        }
         
          
        
        $lava = new Lavacharts;
        $aquisicoes = $lava->DataTable();
        $aquisicoes->addStringColumn('Lista Aquisições')
        ->addNumberColumn('Aquisições do Usuário')
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
        $lava->BarChart('Aquisicoes', $aquisicoes, [
            'title' => ['Relatório de Aquisições - Indicadores do Usuário - Turma '.$nt],
            'titleTextStyle' => [
                'fontSize' => 20,
                'align' => 'center'
            ],
        ]);
        

        
        $aquisicoes2 = $lava->DataTable();
        $aquisicoes2->addStringColumn('Lista Aquisições')
        ->addNumberColumn('Aquisições da Família')
        ->addRow(['19', $decimoNonoCount])
        ->addRow(['20', $vigesimoCount])
        ->addRow(['21', $vigesimoPCount])
        ->addRow(['22', $vigesimoSCount])
        ->addRow(['23', $vigesimoTCount])
        ->addRow(['24', $vigesimoQCount])
        ->addRow(['25', $vigesimoQuiCount])
        ->addRow(['26', $vigesimoSexCount])
        ->addRow(['27', $vigesimoSetCount])
        ->addRow(['28', $vigesimoOitCount])
        ->addRow(['29', $vigesimoNonoCount])
        ->addRow(['30', $trigesimoCount]);
        $nl=chr(10);
        $lava->BarChart('Dados', $aquisicoes2, [
            'title' => ['Relatório de Aquisições - Indicadores da Família - Turma '.$nt],
            'titleTextStyle' => [
                'fontSize' => 20,
                'align' => 'center'
            ],
        ]);
        $data['filial'] = Filial::find(1);
        // $data['nome'] = 

        // return view('fichas-aquisicoes.editRelatorio', $data, ['lava' => $lava]);
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
        'decimoOitCount',
        'decimoNonoCount',
        'vigesimoCount',
        'vigesimoPCount',
        'vigesimoSCount',
        'vigesimoTCount',
        'vigesimoQCount',
        'vigesimoQuiCount',
        'vigesimoSexCount',
        'vigesimoSetCount',
        'vigesimoOitCount',
        'vigesimoNonoCount',
        'trigesimoCount'
        ))->with('tipo', 'BarChart');
    }    
}
