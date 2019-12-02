<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;
use App\PresencaOficinaProjeto;
use App\RelatorioOficinasController;

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
    public function show($id, $type) 
    {
        switch($type)
        {
            case 'projeto':



                
                $dada['dados'] = OficinaProjeto::findOrFail($id);
                $data['nome'] = $data['dados']->nome;
                $data['tipo'] = 'Oficina';
                $data['turma'] = TurmaOficinaProjeto::select('id')->where('id_oficinas_projetos', '=', $id)->get();
                $data['idUsuario'] = array();
                $dataString = "";
                $dadosSeparados = array();
                $index = 0;

                
                $countPresente = PresencaOficinaProjeto::where('estevePresente', '=', 1)->count();
                $countDesistencia = PresencaOficinaProjeto::where('estevePresente', '=', 0)->count();
                
                // $data['presente'] = PresencaOficinaProjeto::select('estevePresente')->where("estevePresente", "=", $id)->count();
                // $data['desistencia'] = RelatorioOficinasController::select('count')->where('id_oficinas_projetos', '=', $id)->get();
               


                //fiz a busca pelo aluno em uma oficina
                foreach($data['turma'] as $dado)
                {
                    $dado = preg_replace('/[^0-9]/', '', strval($dado));
                    // $data['presente'] = PresecaOficinanProjeto::select('estevePresente')->where("estevePresente", "=", $id)->count();
                    // $data['desistencia'] = RelatorioOficinasController::select('count')->where('id_oficinas_projetos', '=', $id)->get();
                    $data['temp'] = OficinaProjeto::where('id_turmas', '=', (int)$dado)->pluck('id_usuario');
                    array_push($data['idUsuario'], $data['temp']);
                }

                $data['idUsuario'] = preg_replace('/[,]+/', ' ', $data['desistencia']);
                $data['idUsuario'] = preg_replace('/[[]+/', ' ', $data['desistencia']);
                $data['idUsuario'] = preg_replace('/[]]+/', ' ', $data['desistencia']);



                foreach($data['desistencia'] as $dado)
                {
                    $dado = preg_split("/[\s,]+/", strval($dado));
                    $dado = implode(" ", $dado);
                    $dataString .= $dado;
                }

                $dataString = preg_replace('/[\s,]/', '', $dataString, 1);
                $dadosSeparados = preg_split("/[\s,]+/", $dataString);
                $qtdItens = count($dadosSeparados);




                //pego o aluno 
                foreach($dadosSeparados as $dado){
                    if(++$index === $qtdItens){
                        echo "";
                    } else {
                    //pega preseca de cada aluno de uma oficina
                    $data['etvP'] = usuario::where('id', '=', $dado)->count();
                    $data['estevePresente'][] = $data['estvP'];

                    //pega desistecia total de uma oficina 
                    $data['count'] = oficina::where('id', '=', $dado)->pluck('count');
                    $data['countDesistencia'][] = $data['count'];

                    
                    }
                }
                break;

                return $this->GraficoRelatorioDesistecicaProjeto($id, $type, $data);

            //case 'prgrama':
       }
    }
    

    public function GraficoRelatorioDesistecicaProjeto($id, $type, $data){
        $data['filial'] = Filial::find(1);
        // var_dump($data['idUsuario']);
        $lava = new \Khill\Lavacharts\Lavacharts;

        $gender = $lava->DataTable();
        $gender->addStringColumn('Desistencia')
                ->addNumberColumn('Quantidade')
                ->addRow(['Presenca', 5])
                ->addRow(['Desistencia', 2]);
        $lava->PieChart('IMDB', $gender, [
            'title'  => 'Desistencia',
            'is3D'   => false,
            'titleTextStyle' => [
                'fontSize' => 24
            ]
        ]);

        return view('RelatorioDesistenciaProjeto.index', $data, ['lava' => $lava]);
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
