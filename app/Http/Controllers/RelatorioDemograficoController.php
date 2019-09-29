<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OficinaProjeto;
use App\Filial;
use Illuminate\Support\Carbon;
use Illuminate\Support\Lavacharts;

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
    public function show($id)
    {
        //
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

    public function calculaIdades(){

    }

    public function relatorioDemografico($id){
        $data['oficina'] = OficinaProjeto::find($id);
        $data['filial'] = Filial::find(1);

        $lava = new \Khill\Lavacharts\Lavacharts;

        //IDADE
        $age = $lava->DataTable();

        $age->addStringColumn('Intervalo')
            ->addNumberColumn('Quantidade')
            ->addRow(['< 12',  rand(0,100)])
            ->addRow(['12 - 18',  rand(0,100)])
            ->addRow(['19 - 25',  rand(0,100)])
            ->addRow(['26 - 30', rand(0,100)])
            ->addRow(['31 - 35',   rand(0,100)])
            ->addRow(['36 - 40', rand(0, 100)])
            ->addRow(['41 - 45', rand(0, 100)])
            ->addRow(['> 45', rand(0, 100)]);

        $lava->BarChart('Idade', $age, [
            'title' => 'Idade',
            'titleTextStyle' => [
                'fontSize' => 24
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
            ]
        ]);

        //RENDA MENSAL

        $salary = $lava->DataTable();
        $salary->addStringColumn('Salário')
                ->addNumberColumn('Renda')
                ->addRow(['Baixa', 1000])
                ->addRow(['Média', 600])
                ->addRow(['Alta', 200]);

        $lava->ColumnChart('Salary', $salary, [
            'title' => 'Renda Mensal',
            'titleTextStyle' => [
                'color'    => '#000000',
                'fontSize' => 24
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
            ]
        ]);

        //COMPOSIÇÃO FAMILIAR
        $family = $lava->DataTable();
        $family->addStringColumn('Intervalo')
                ->addNumberColumn('Membros')
                ->addRow(['1 - 2', 500])
                ->addRow(['3 - 5', 600])
                ->addRow(['6 - 9', 200])
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
