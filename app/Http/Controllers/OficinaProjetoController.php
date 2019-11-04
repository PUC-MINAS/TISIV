<?php

namespace App\Http\Controllers;

use App\OficinaProjeto;
use App\Projeto;
use Illuminate\Http\Request;
use App\Programa;
use App\TurmaOficinaProjeto;
use App\PresencaOficinaProjeto;
use App\MatriculaOficinaProjeto;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
use App\Filial;

class OficinaProjetoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = OficinaProjeto::all();
        return view('oficinas-projetos.index')->with('oficinas', $oficinas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projetos = Projeto::all();
        return view('oficinas-projetos.create')->with('projetos', $projetos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina = new OficinaProjeto();
        $oficina->nome = $request['nome'];
        $oficina->id_projetos = $request['projeto'];
        $oficina->local = $request['local'];
        $oficina->cargaHoraria = $request['cargaHoraria'];
        $oficina->percentualMinimoFrequencia = $request['percentualMinimoFrequencia'];
        $oficina->inicio = $request['inicio'];
        $oficina->fim = $request['fim'];
        $oficina->ementa = $request['ementa'];

        $oficina->save();

        return redirect('oficinas-projetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oficina = OficinaProjeto::find($id);
        return view('oficinas-projetos.show')->with('oficina', $oficina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina = OficinaProjeto::find($id);
        $projetos = Projeto::all();
        return view('oficinas-projetos.edit')->with('oficina', $oficina)
                                             ->with('projetos', $projetos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oficina = OficinaProjeto::find($id);
        $oficina->nome = $request['nome'];
        $oficina->id_projetos = $request['projeto'];
        $oficina->local = $request['local'];
        $oficina->cargaHoraria = $request['cargaHoraria'];
        $oficina->percentualMinimoFrequencia = $request['percentualMinimoFrequencia'];
        $oficina->inicio = $request['inicio'];
        $oficina->fim = $request['fim'];
        $oficina->ementa = $request['ementa'];

        $oficina->save();
        return redirect('oficinas-projetos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OficinaProjeto  $oficinaProjeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oficina = OficinaProjeto::destroy($id);
        return redirect('oficinas-projetos');
    }

    public function graficoPresencaOficina($idOficina){
     
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $nomeOficina = OficinaProjeto::select('nome')->where([['id','=',$idOficina]])->get();
        foreach($nomeOficina as $value=>$arrayNomeOficina)
            $nome=$arrayNomeOficina['nome'];
        
        $idTurmas=TurmaOficinaProjeto::select('id')->where([['id_oficinas_projetos','=',$idOficina]])->get();

        $presencaTotal=array();
        $totalAlunos=array();

        //foreach($idOficinas as $arrayIdOficinas){
        //    $idTurma=TurmaOficinaProjeto::select('id')->where([['id_oficinas_projetos', '=', $arrayIdOficinas['id']]])->get();
            foreach($idTurmas as $tu){
            $contPresenca=PresencaOficinaProjeto::select('id_turmas', 'estevePresente' )->where([['id_turmas', '=', $tu['id']],['estevePresente', '=',1],])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
            $contTotal = PresencaOficinaProjeto::where('id_turmas', '=', $tu['id'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
       
            array_push($presencaTotal, $contPresenca);
            array_push($totalAlunos,$contTotal);
        }
        
        $presenca = array_sum($presencaTotal);
        $total=array_sum($totalAlunos);
       
        $lava = new Lavacharts;
        $alunos = $lava->DataTable();
        $falta=$total-$presenca;
        $alunos->addStringColumn('Turma')
        ->addNumberColumn('Presença')
        ->addRow(['Presença', $presenca])
        ->addRow(['Falta', $falta]);
        $nl=chr(10);
        $lava->DonutChart('Dados', $alunos, [
            'title' => ['Relatório Semanal de Frequência - Projeto '.$nome.' ( '.Carbon::now()->startOfWeek()->format(' d-m-Y '). ' até '. now()->format(' d-m-Y ').' )'],
            'titleTextStyle' => [
                'fontSize' => 20,
                'align' => 'center'
            ],
        ]);
        
        $data['filial'] = Filial::find(1);
        return view('matriculas-oficinas-projetos.edit',$data)->with(compact('lava','presenca', 'falta'))->with('tipo', 'DonutChart');
    }    
}
