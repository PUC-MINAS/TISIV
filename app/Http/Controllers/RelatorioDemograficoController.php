<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OficinaProjeto;
use App\Filial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Lavacharts;
use App\Projeto;
use App\Programa;
use App\TurmaOficinaProjeto;
use App\MatriculaOficinaProjeto;
use App\usuario;

class RelatorioDemograficoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = OficinaProjeto::all();
        return view('relatorio-demografico.index')->with('oficinas', $oficinas);
    }

    public function pegaDados($id, $type){
        switch($type){

            case 'oficina':
            $data['dados'] = OficinaProjeto::findOrFail($id);
            $data['nome'] = $data['dados']->nome;
            $data['tipo'] = 'Oficina';
            $data['turma'] = TurmaOficinaProjeto::select('id')->where('id_oficinas_projetos', '=', $id)->get();
            $data['idUsuario'] = array();

            foreach($data['turma'] as $dado){
                $dado = preg_replace('/[^0-9]/', '', strval($dado));
                echo('DADOUSUARIO' . $dado);
                $data['temp'] = MatriculaOficinaProjeto::where('id_turmas', '=', (int)$dado)->pluck('id_usuario');
                array_push($data['idUsuario'], $data['temp']);
            }

            $data['idUsuario'] = preg_replace('/[,]+/', ' ', $data['idUsuario']);
            $data['idUsuario'] = preg_replace('/[[]+/', ' ', $data['idUsuario']);
            $data['idUsuario'] = preg_replace('/[]]+/', ' ', $data['idUsuario']);
           
            $dataString = "";
            foreach($data['idUsuario'] as $dado){
                $dado = preg_split("/[\s,]+/", strval($dado));
                $dado = implode(" ", $dado);
                $dataString .= $dado;
            }
            var_dump($dataString);
            // $dado['idFormatado'] = preg_split("/[\s,]+/", $dataString);
            // foreach($data['idUsuario'] as $dado){

            //     echo('MEU DEUS DO CÉU OLHA AQUI');
            //     var_dump($dado);
            //     // $data['idade'] = usuario::select('idade')->where('id', '=', $dado)->get();
            //     $data['genero'] = usuario::where('id', '=', 1)->pluck('sexo');
            //     $data['etnia'] = usuario::where('id', '=', 1)->pluck('raca_cor');
            //     //rent
            //     $data['escolaridade'] = usuario::select('escolaridade')->where('id', '=', 1)->get();
            //     //family
            // }
            break;

            case 'projeto':
            $data['dados'] = Projeto::findOrFail($id);
            $data['tipo'] = 'Projeto';
            $data['nome'] = $data['dados']->nome;
            break;

            case 'programa':
            $data['dados'] = Programa::findOrFail($id);
            $data['tipo'] = 'Programa';
            $data['nome'] = $data['dados']->nome;
            break;

            default:
            return Programa::findOrFail(-1);
        }
        $this->filtraDados($data);
        return $this->relatorioDemografico($id, $type, $data);
    }

    public function filtraDados($data){
        /**idade */

    }

    /*generate graphics and send them to render in blade*/
    public function relatorioDemografico($id, $type, $data){

        $data['filial'] = Filial::find(1);
        // var_dump($data['idUsuario']);
        $lava = new \Khill\Lavacharts\Lavacharts;

        //IDADE
        $age = $lava->DataTable();

        $age->addStringColumn('Intervalo')
            ->addNumberColumn('Quantidade')
            ->addRow(['< 12',  rand(0,100)])
            ->addRow(['12 a 18',  rand(0,100)])
            ->addRow(['19 a 25',  rand(0,100)])
            ->addRow(['26 a 30', rand(0,100)])
            ->addRow(['31 a 35',   rand(0,100)])
            ->addRow(['36 a 40', rand(0, 100)])
            ->addRow(['41 a 45', rand(0, 100)])
            ->addRow(['> 45', rand(0, 100)]);

        $lava->BarChart('Idade', $age, [
            'title' => 'Idade',
            'titleTextStyle' => [
                'fontSize' => 24,
                'color' => 'black',
            ],
            'legend' => [
                'position' => 'none'
            ]
        ]);
        

        //GÊNERO

        $gender = $lava->DataTable();
        $gender->addStringColumn('Gênero')
                ->addNumberColumn('Quantidade')
                ->addRow(['Feminino', 5])
                ->addRow(['Masculino', 2]);

        $lava->PieChart('IMDB', $gender, [
            'title'  => 'Gênero',
            'is3D'   => false,
            'titleTextStyle' => [
                'fontSize' => 24
            ]
        ]);

        //ETNIA

        $ethnicity  = $lava->DataTable();
        $ethnicity->addStringColumn('Etnia')
            ->addNumberColumn('Quantidde')
            ->addRow(['Amarela',  rand(1000,5000)])
            ->addRow(['Branca',  rand(1000,5000)])
            ->addRow(['Indígena',  rand(1000,5000)])
            ->addRow(['Parda', rand(1000,5000)])
            ->addRow(['Preta',   rand(1000,5000)])
            ->addRow(['Não declarada', 100]);

        $lava->BarChart('Votes', $ethnicity, [
            'title' => 'Etnia',
            'titleTextStyle' => [
                'fontSize' => 24
            ],
            'legend' => [
                'position' => 'none'
            ]
        ]);

        //RENDA MENSAL

        $salary = $lava->DataTable();
        $salary->addStringColumn('Salário')
                ->addNumberColumn('Quantidade')
                ->addRow(['Baixa', 1000])
                ->addRow(['Média', 600])
                ->addRow(['Alta', 200]);

        $lava->ColumnChart('Salary', $salary, [
            'title' => 'Renda Mensal',
            'titleTextStyle' => [
                'color'    => '#000000',
                'fontSize' => 24
            ],
            'legend' => [
                'position' => 'none'
            ]
        ]);

        //NÍVEL DE ESCOLARIDADE

        $schooling = $lava->DataTable();
        $schooling->addStringColumn('Nível')
                ->addNumberColumn('Completo')
                ->addNumberColumn('Incompleto')
                ->addRow(['Fundamental', 1000, 400])
                ->addRow(['Médio', 1170, 460])
                ->addRow(['Superior', 660, 1120]);

        $lava->ColumnChart('Finances', $schooling, [
            'title' => 'Escolaridade',
            'titleTextStyle' => [
                'color'    => '#000000',
                'fontSize' => 24
            ],
            'legend' => [
                'position' => 'none'
            ]
        ]);

        //COMPOSIÇÃO FAMILIAR
        $family = $lava->DataTable();
        $family->addStringColumn('Intervalo')
                ->addNumberColumn('Membros')
                ->addRow(['1 a 2', 500])
                ->addRow(['3 a 5', 600])
                ->addRow(['6 a 9', 200])
                ->addRow(['10+', 50]);

        $lava->ColumnChart('Family', $family, [
            'title' => 'Composição Familiar',
            'titleTextStyle' => [
                'color'    => '#000000',
                'fontSize' => 24
            ]
        ]);

        return view('relatorio-demografico.index', $data, ['lava' => $lava]);
    }

}