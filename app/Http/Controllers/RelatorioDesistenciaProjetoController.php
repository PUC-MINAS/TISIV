<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;
use App\PresencaOficinaProjeto;
use App\RelatorioOficinasController;
use App\ProjetoController;
use App\ProgramaController;
use App\Projeto;
use Carbon\Carbon;
use Khill\Lavacharts\Lavacharts;
use App\Filial;

class RelatorioDesistenciaProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('relatorio-desistencia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idProjeto)
    {

        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);




        $nomeProjeto = Projeto::select('nome')->where([['id', '=', $idProjeto]])->get();
        foreach ($nomeProjeto as $value => $arrayNomeProjeto)
            $nome = $arrayNomeProjeto['nome'];


        $idOficinas = OficinaProjeto::select('id')->where([['id_projetos', '=', $idProjeto]])->get();

        $presencaTotal = array();
        $totalAlunos = array();


        foreach ($idOficinas as $arrayIdOficinas) {
            $idTurma = TurmaOficinaProjeto::select('id')->where([['id_oficinas_projetos', '=', $arrayIdOficinas['id']]])->get();
            foreach ($idTurma as $tu) {                                                           //pega o id igual ao que eu quero e compara com a presença igual à que eu quero 
                // $contPresenca = PresencaOficinaProjeto::select('id_turmas', 'estevePresente')->where([['id_turmas', '=', $tu['id']], ['estevePresente', '=', 1],])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                // $contTotal = PresencaOficinaProjeto::where('id_turmas', '=', $tu['id'])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

                $countDesistencia = PresencaOficinaProjeto::select('id_turmas', 'estevePresente')->where([['id_turmas', '=', $tu['id']], ['estevePresente', '=', 1],])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
                //$teste['dados'] = PresencaOficinaProjeto::select('id_turmas','estevePresente')->where([['id_turmas', "=", $tu['id']], ["estevePresente", '=', 1],])->count();
                //$teste['dados2'] = OficinaProjeto::select("percentualMinimoFrequencia")->where('id', '=', $id)->get();
                $countTotal = PresencaOficinaProjeto::where('estevePresente', '=', 1)->count();
                


                array_push($presencaTotal, $countDesistencia);
                array_push($totalAlunos, $countTotal);
            }
        }

        $presenca = array_sum($presencaTotal);
        $total = array_sum($totalAlunos);





        $lava = new Lavacharts;
        $alunos = $lava->DataTable();
        $falta = $total - $presenca;
        $alunos->addStringColumn('Turma')
            ->addNumberColumn('Presença')
            ->addRow(['Presença', $presenca])
            ->addRow(['Falta', $falta]);
        $nl = chr(10);
        $lava->DonutChart('Dados', $alunos, [
            'title' => ['Relatório Semanal de Desistência - Projeto ' . $nome . ' ( ' . Carbon::now()->startOfWeek()->format(' d-m-Y ') . ' até ' . now()->format(' d-m-Y ') . ' )'],
            'titleTextStyle' => [
                'fontSize' => 20,
                'align' => 'center'
            ],
        ]);

        $data['filial'] = Filial::find(1);
        return view('RelatorioDesistenciaProjeto.index',$data)->with(compact('lava','presenca', 'falta'))
                                                             ->with('tipo', 'DonutChart');
        
        
    }
    



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
