<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TurmaOficinaProjeto;
use App\OficinaProjeto;
use App\PresencaOficinaProjeto;
use App\MatriculaOficinaProjeto;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;
use App\Filial;
class PresencaOficinaProjetoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ($idOficina, $idTurma) {
        $turma = TurmaOficinaProjeto::find($idTurma);
        $oficina = OficinaProjeto::find($idOficina);
        return view('presencas-oficinas-projetos.index')->with('turma', $turma)
                                                        ->with('oficina', $oficina);
    }

    public function create ($idOficina, $idTurma) {
        $turma = TurmaOficinaProjeto::find($idTurma);
        $oficina = OficinaProjeto::find($idOficina);
        return view('presencas-oficinas-projetos.create')->with('turma', $turma)
                                                         ->with('oficina', $oficina);
    }

    public function store ($idOficina, $idTurma, Request $request) {
        $turma = TurmaOficinaProjeto::find($idTurma);
        $matriculas = $turma->getMatriculas();
        $dataPresenca = $request['data'];
        $presencas = array();
        foreach($matriculas as $matricula){
            $presenca = new PresencaOficinaProjeto();
            $presenca->data = $dataPresenca;
            $presenca->estevePresente = $request[$matricula->id] != null ? true : false;
            $presenca->id_matriculas = $matricula->id;
            $presenca->id_turmas = $turma->id;
            $presencas[] = $presenca;
            $presenca->save();
        }

        return redirect('oficinas-projetos/'.$idOficina.'/turmas/'.$idTurma.'/presencas');
    }

    public function show($idOficina, $idTurma, $data) {
        $oficina = OficinaProjeto::find($idOficina);
        $turma = TurmaOficinaProjeto::find($idTurma);
        $presencas = $turma->getPresencas()->where('data', $data);

        return view('presencas-oficinas-projetos.show')->with('turma', $turma)
                                                       ->with('presencas', $presencas)
                                                       ->with('data', $data)
                                                       ->with('oficina', $oficina);
    }

    public function justificar ($idOficina, $idTurma, $idPresenca, Request $request) {
        $presenca = PresencaOficinaProjeto::find($idPresenca);
        $presenca->justificada = true;
        $presenca->justificativa = $request['justificativa'];

        $presenca->save();

        return redirect('oficinas-projetos/'.$idOficina.'/turmas/'.$idTurma.'/presencas/'.$presenca->data);
    }

    public function plotar(){
            return self::Barra();
        }

    public function grafico($id){
        
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $presenca= PresencaOficinaProjeto::select('id_turmas', 'estevePresente' )->where([['id_turmas', '=', $id],['estevePresente', '=',1],])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $total = PresencaOficinaProjeto::where('id_turmas', '=', $id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $d= PresencaOficinaProjeto::select('id_turmas', 'estevePresente','created_at' )->where([['id_turmas', '=', $id],['estevePresente', '=',1],])->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $lava = new Lavacharts;
        $alunos = $lava->DataTable();
        $falta=$total-$presenca;
        $alunos->addStringColumn('Turma')
        ->addNumberColumn('Presença')
        ->addRow(['Presença', $presenca])
        ->addRow(['Falta', $falta]);
        

        $lava->DonutChart('Dados', $alunos, [
            'title' => 'Relatório de Frequência',
            'titleTextStyle' => [
                'fontSize' => 20
            ],
        ]);
        
        $data['filial'] = Filial::find(1);
        return view('matriculas-oficinas-projetos.edit',$data)->with(compact('lava','presenca', 'falta','d'))->with('tipo', 'DonutChart');
    }    
}
