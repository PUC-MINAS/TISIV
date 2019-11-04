<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Programa;
use App\TurmaOficinaProjeto;
use App\OficinaProjeto;
use App\PresencaOficinaProjeto;
use App\MatriculaOficinaProjeto;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
use App\Filial;

class ProjetoController extends Controller
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
        $projetos = Projeto::all();
        return view('projetos.index')->with('projetos', $projetos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::all();
        return view('projetos.create')->with('programas', $programas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projeto = new Projeto();
        $projeto->nome = $request->input('nome');
        $projeto->id_programas = $request->input('programa');
        $projeto->objetivo = $request->input('objetivo');
        $projeto->descricao = $request->input('descricao');
        $projeto->inicio = date($request->input('inicio'));
        $projeto->fim = date($request->input('fim'));
        $projeto->save();
        return redirect('projetos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projeto = Projeto::find($id);
        return view('projetos.show')->with('projeto', $projeto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = Projeto::find($id);
        $programas = Programa::all();
        return view('projetos.edit')->with('projeto', $projeto)
                                    ->with('programas', $programas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projeto = Projeto::find($id);
        $projeto->nome = $request->input('nome');
        $projeto->id_programas = $request->input('programa');
        $projeto->objetivo = $request->input('objetivo');
        $projeto->descricao = $request->input('descricao');
        $projeto->inicio = date($request->input('inicio'));
        $projeto->fim = date($request->input('fim'));
        $projeto->save();
        return redirect('projetos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projeto = Projeto::destroy($id);
        return redirect('projetos');
    }

    public function graficoPresencaProjeto($idProjeto){
     
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $nomeProjeto = Projeto::select('nome')->where([['id','=',$idProjeto]])->get();
        foreach($nomeProjeto as $value=>$arrayNomeProjeto)
            $nome=$arrayNomeProjeto['nome'];
        
        $idOficinas=OficinaProjeto::select('id')->where([['id_projetos','=',$idProjeto]])->get();

        $presencaTotal=array();
        $totalAlunos=array();

        foreach($idOficinas as $arrayIdOficinas){
            $idTurma=TurmaOficinaProjeto::select('id')->where([['id_oficinas_projetos', '=', $arrayIdOficinas['id']]])->get();
            foreach($idTurma as $tu){
            $contPresenca=PresencaOficinaProjeto::select('id_turmas', 'estevePresente' )->where([['id_turmas', '=', $tu['id']],['estevePresente', '=',1],])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
            $contTotal = PresencaOficinaProjeto::where('id_turmas', '=', $tu['id'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
       
            array_push($presencaTotal, $contPresenca);
            array_push($totalAlunos,$contTotal);
        }
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
