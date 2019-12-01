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

    public function pegaUsuario($id){

    }

    public function pegaDados($id, $type){

        switch($type){

            case 'oficina':

            /**declaracao de variaveis */
            $data['dados'] = OficinaProjeto::findOrFail($id);
            $data['nome'] = $data['dados']->nome;
            $data['tipo'] = 'Oficina';
            $data['turma'] = TurmaOficinaProjeto::select('id')->where('id_oficinas_projetos', '=', $id)->get();
            $data['idUsuario'] = array();
            $data['genero'] = array();
            $data['etnia'] = array();
            $data['escolaridade'] = array();
            $data['idade'] = array();
            $dataString = "";
            $dadosSeparados = array();
            $index = 0;

            /**para cada turma:
             * substitui a sintaxe '{id:1}' para somente 1;
             * a partir do 1, faz a busca pelo aluno na tabela de matricula
             * coloca o resultado da busca num array (tirar array_push depois)
             */
            foreach($data['turma'] as $dado){
                $dado = preg_replace('/[^0-9]/', '', strval($dado));
                $data['temp'] = MatriculaOficinaProjeto::where('id_turmas', '=', (int)$dado)->pluck('id_usuario');
                array_push($data['idUsuario'], $data['temp']);
            }

            /**
             * Os dados vão ficar numa sintaxe como essa:
             * [1,2], [3,4,5]
             * o replace é para tirar a vírgula e os colchetes, deixando o resultado como:
             * 1 23 4 5(array)
             */
            $data['idUsuario'] = preg_replace('/[,]+/', ' ', $data['idUsuario']);
            $data['idUsuario'] = preg_replace('/[[]+/', ' ', $data['idUsuario']);
            $data['idUsuario'] = preg_replace('/[]]+/', ' ', $data['idUsuario']);
           
            /**
             * para cada conjunto de ids '1 2' encontrado:
             * os separa pelo espaço e adiciona num array;
             * converte o array para string, colocando espaço entre eles (implode);
             * concatena o resultado numa string;
             * resultado: 1 2 3 4 5 (string)
             */
            foreach($data['idUsuario'] as $dado){
                $dado = preg_split("/[\s,]+/", strval($dado));
                $dado = implode(" ", $dado);
                $dataString .= $dado;
            }

            // var_dump($dataString);

            /**
             * tira o primeiro espaço da string
             * separa cada numero pelo espaço e armazena num array
             * conta quantos itens para impedir o foreach de fazer a ultima iteração, que seria um espaço
             */
            $dataString = preg_replace('/[\s,]/', '', $dataString, 1);
            $dadosSeparados = preg_split("/[\s,]+/", $dataString);
            $qtdItens = count($dadosSeparados);

            /**
             * faz a busca para cada id do array dadosSeparados e adiciona num array
             */
            foreach($dadosSeparados as $dado){
                if(++$index === $qtdItens){
                    echo "";
                } else {
                $data['ida'] = usuario::select('dta_nasc')->where('id', '=', $dado)->get();
                $data['ida'] = preg_replace('/[\[|\]|\{|\}\"]+/', '', strval($data['ida']));
                $data['ida'] = preg_replace('/dta_nasc:|null/', '', $data['ida']);
                $data['ida'] = $this->calcIdade($data['ida']);
                $data['idade'][] = $data['ida'];
                $data['gen'] = usuario::where('id', '=', $dado)->pluck('sexo');
                $data['genero'][] = $data['gen'];
                $data['etn'] = usuario::where('id', '=', $dado)->pluck('raca_cor');
                $data['etnia'][] = $data['etn'];
                $data['esc'] = usuario::where('id', '=', $dado)->pluck('escolaridade');
                // echo'escolaridade a a   a a a a';var_dump($data['esc']);
                $data['escolaridade'][] = $data['esc'];
                //family
                }
            }
            break;

            case 'projeto':

            $data['idTurma'] = array();
            $data['idUsuario'] = array();
            $data['genero'] = array();
            $data['etnia'] = array();
            $data['escolaridade'] = array();
            $dataString = "";
            $dadosSeparados = array();
            $index = 0;
            $data['dados'] = Projeto::findOrFail($id);
            $data['nome'] = $data['dados']->nome;
            $data['tipo'] = 'Projeto';
            $data['idade'] = array();
            $data['oficinas'] = OficinaProjeto::select('id')->where('id_projetos', '=', $id)->get();
            // var_dump($data['oficinas']);
            

            foreach($data['oficinas'] as $dado){
                
                $dado = preg_replace('/[^0-9]/', '', strval($dado));
                // echo $dado . 'dhuhue  ';
                $data['temp'] = TurmaOficinaProjeto::where('id_oficinas_projetos', '=', (int)$dado)->pluck('id');
                
                $data['idTurma'][] = $data['temp'];
            }

            $data['idTurma'] = preg_replace('/[,]+/', ' ', $data['idTurma']);
            $data['idTurma'] = preg_replace('/[[]+/', ' ', $data['idTurma']);
            $data['idTurma'] = preg_replace('/[]]+/', ' ', $data['idTurma']);

            foreach($data['idTurma'] as $dado){
                $dado = preg_split("/[\s,]+/", strval($dado));
                $dado = implode(" ", $dado);
                $dataString .= $dado;
            }
            $data['idTurma'] = explode(" ", $dataString);
            var_dump($data['idTurma']);
            $qtdId = count($data['idTurma']);
            $ind = 0;

            foreach($data['idTurma'] as $dado){
                if(++$ind === $qtdId){
                    echo "";
                }
                else {
                $dado = preg_replace('/[^0-9]/', '', strval($dado));
                $data['temp'] = MatriculaOficinaProjeto::where('id_turmas', '=', (int)$dado)->pluck('id_usuario');
                // echo $data['temp'] . 'testeinho';
                array_push($data['idUsuario'], $data['temp']);}
            }

            // $data['turma'] = TurmaOficinaProjeto::select('id')->where('id_oficinas_projetos', '=', $id)->get();
            // 
            // $data['nome'] = $data['dados']->nome;
            // $data['oficina'] = OficinaProjeto::select('id')->where('id_oficinas_projetos', '=', $id)->get();

            $data['idUsuario'] = preg_replace('/[,]+/', ' ', $data['idUsuario']);
            $data['idUsuario'] = preg_replace('/[[]+/', ' ', $data['idUsuario']);
            $data['idUsuario'] = preg_replace('/[]]+/', ' ', $data['idUsuario']);
           
            /**
             * para cada conjunto de ids '1 2' encontrado:
             * os separa pelo espaço e adiciona num array;
             * converte o array para string, colocando espaço entre eles (implode);
             * concatena o resultado numa string;
             * resultado: 1 2 3 4 5 (string)
             */
            $dataString = "";
            foreach($data['idUsuario'] as $dado){
                $dado = preg_split("/[\s,]+/", strval($dado));
                $dado = implode(" ", $dado);
                $dataString .= $dado;
            }

            // var_dump($dataString);

            /**
             * tira o primeiro espaço da string
             * separa cada numero pelo espaço e armazena num array
             * conta quantos itens para impedir o foreach de fazer a ultima iteração, que seria um espaço
             */
            $dataString = preg_replace('/[\s,]/', '', $dataString, 1);
            $dadosSeparados = preg_split("/[\s,]+/", $dataString);
            $qtdItens = count($dadosSeparados);

            /**
             * faz a busca para cada id do array dadosSeparados e adiciona num array
             */
            foreach($dadosSeparados as $dado){
                if(++$index === $qtdItens){
                    echo "";
                } else {
                $data['ida'] = usuario::select('dta_nasc')->where('id', '=', $dado)->get();
                $data['ida'] = preg_replace('/[\[|\]|\{|\}\"]+/', '', strval($data['ida']));
                $data['ida'] = preg_replace('/dta_nasc:|null/', '', $data['ida']);
                $data['ida'] = $this->calcIdade($data['ida']);
                $data['idade'][] = $data['ida'];
                $data['gen'] = usuario::where('id', '=', $dado)->pluck('sexo');
                $data['genero'][] = $data['gen'];
                $data['etn'] = usuario::where('id', '=', $dado)->pluck('raca_cor');
                $data['etnia'][] = $data['etn'];
                $data['esc'] = usuario::where('id', '=', $dado)->pluck('escolaridade');
                // echo'escolaridade a a   a a a a';var_dump($data['esc']);
                $data['escolaridade'][] = $data['esc'];
                //family
                }
            }
            break;

            case 'programa':
            $data['dados'] = Programa::findOrFail($id);
            $data['tipo'] = 'Programa';
            $data['nome'] = $data['dados']->nome;
            break;

            default:
            return Programa::findOrFail(-1);
        }
        $data['genero'] = $this->filtraGenero($data['genero']);
        // var_dump($data['genero']);
        $data['etnia'] = $this->filtraEtnia($data['etnia']);
        $data['escolaridade'] = $this->filtraEscolaridade($data['escolaridade']);
        $data['idade'] = $this->filtraIdade($data['idade']);
        return $this->relatorioDemografico($id, $type, $data);
    }

    public function calcIdade($data){
        if($data == null){
            return 0;
        } else {
        $nascimento = strtotime($data);
        $hoje = strtotime(date('Y-m-d'));
        $idade = floor( (($hoje - $nascimento) / 60 / 60 / 24 / 365.25) );
        return $idade;
        }
    }

    public function filtraGenero($data){
        $naoInformado = 0; $masculino = 0; $feminino = 0;
        foreach($data as $dado){
            if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '0'){$naoInformado++;} 
            else if (preg_replace('/[\[|\]]+/', '', strval($dado)) === '1'){$masculino++;}
            else {$feminino++;}
        }
        $array[] = $naoInformado; $array[] = $masculino; $array[] = $feminino;
        return $array;
    }

    public function filtraEtnia($data){
        $naoInformado = 0; $branca = 0; $preta = 0; $amarela = 0; $parda = 0;
        foreach($data as $dado){
            if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '0'){$naoInformado++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '1'){$branca++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '2'){$preta++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '3'){$amarela++;}
            else{$parda++;}
        }
        $array[] = $naoInformado; $array[] = $branca; $array[] = $preta; $array[] = $amarela; $array[] = $parda;
        return $array;
    }

    public function filtraEscolaridade($data){
        $naoInformado = 0; $analfabeto = 0; $fundamentalIncompleto = 0; $fundamentalCompleto = 0; $medioIncompleto = 0; $medioCompleto = 0; $tecnicoIncompleto = 0; $tecnicoCompleto = 0; $superiorIncompleto = 0; $superiorCompleto = 0; $posIncompleta = 0; $posCompleta = 0;
        foreach($data as $dado){
            // echo 'dado';var_dump($dado);
            if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '0'){$naoInformado++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '1'){$analfabeto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '2'){$fundamentalIncompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '3'){$fundamentalCompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '4'){$medioIncompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '5'){$medioCompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '6'){$tecnicoIncompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '7'){$tecnicoCompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '8'){$superiorIncompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '9'){$superiorCompleto++;}
            else if(preg_replace('/[\[|\]]+/', '', strval($dado)) === '10'){$posIncompleta++;}
            else{$posCompleta++;}
        }
        $array[] = $naoInformado; $array[] = $analfabeto; $array[] = $fundamentalIncompleto; $array[] = $fundamentalCompleto; $array[] = $medioIncompleto; $array[] = $medioCompleto; $array[] = $tecnicoIncompleto; $array[] = $tecnicoCompleto; $array[] = $superiorIncompleto; $array[] = $superiorCompleto; $array[] = $posIncompleta; $array[] = $posCompleta;
        return $array;

    }

    public function filtraIdade($data){
        $doze = 0; $dezoito = 0; $vintecinco = 0; $trinta = 0; $trintacinco = 0; $quarenta = 0; $quarentacinco = 0; $infinito = 0;
        foreach($data as $dado){
            if($dado == 0){}
        else if(intval(preg_replace('/[\[|\]]+/', '', strval($dado))) < 12){$doze++;}
        else if(intval(preg_replace('/[\[|\]]+/', '', strval($dado))) > 12 && intval(preg_replace('/[\[|\]]+/', '', strval($dado))) <= 18){$dezoito++;}
        else if(intval(preg_replace('/[\[|\]]+/', '', strval($dado))) > 18 && intval(preg_replace('/[\[|\]]+/', '', strval($dado))) <= 25){$vintecinco++;}
        else if(intval(preg_replace('/[\[|\]]+/', '', strval($dado))) > 25 && intval(preg_replace('/[\[|\]]+/', '', strval($dado))) <= 30){$trinta++;}
        else if(intval(preg_replace('/[\[|\]]+/', '', strval($dado))) > 30 && intval(preg_replace('/[\[|\]]+/', '', strval($dado))) <= 35){$trintacinco++;}
        else if(intval(preg_replace('/[\[|\]]+/', '', strval($dado))) > 35 && intval(preg_replace('/[\[|\]]+/', '', strval($dado))) <= 40){$quarenta++;}
        else if(intval(preg_replace('/[\[|\]]+/', '', strval($dado))) > 40 && intval(preg_replace('/[\[|\]]+/', '', strval($dado))) <= 45){$quarentacinco++;}
        else{$infinito++;}}

        $array[] = $doze; $array[] = $dezoito; $array[] = $vintecinco; $array[] = $trinta; $array[] = $trintacinco; $array[] = $quarenta; $array[] = $quarentacinco; $array[] = $infinito;
        return $array;
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
            ->addRow(['< 12',  $data['idade'][0]])
            ->addRow(['12 a 18',  $data['idade'][1]])
            ->addRow(['19 a 25',  $data['idade'][2]])
            ->addRow(['26 a 30', $data['idade'][3]])
            ->addRow(['31 a 35',   $data['idade'][4]])
            ->addRow(['36 a 40', $data['idade'][5]])
            ->addRow(['41 a 45', $data['idade'][6]])
            ->addRow(['> 45', $data['idade'][7]]);

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
                ->addRow(['Feminino', $data['genero'][2]])
                ->addRow(['Masculino', $data['genero'][1]])
                ->addRow(['Não especificado', $data['genero'][0]]);

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
            ->addRow(['Amarela',  $data['etnia'][3]])
            ->addRow(['Branca',  $data['etnia'][1]])
            ->addRow(['Indígena',  0])
            ->addRow(['Parda', $data['etnia'][4]])
            ->addRow(['Preta',   $data['etnia'][2]])
            ->addRow(['Não declarada', $data['etnia'][0]]);

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
                ->addRow(['Não Informado', 0, $data['escolaridade'][0]])
                ->addRow(['Analfabeto'], 0, $data['escolaridade'][1])
                ->addRow(['Fundamental', $data['escolaridade'][3], $data['escolaridade'][2]])
                ->addRow(['Médio', $data['escolaridade'][5], $data['escolaridade'][4]])
                ->addRow(['Técnico', $data['escolaridade'][7], $data['escolaridade'][6]])
                ->addRow(['Superior', $data['escolaridade'][9], $data['escolaridade'][8]])
                ->addRow(['Pós-graduação', $data['escolaridade'][11], $data['escolaridade'][10]]);

        $lava->ColumnChart('Finances', $schooling, [
            'title' => 'Escolaridade',
            'titleTextStyle' => [
                'color'    => '#000000',
                'fontSize' => 24
            ],
            'legend' => [
                'position' => 'bottom'
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