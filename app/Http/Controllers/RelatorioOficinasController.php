<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;
use App\PresencaOficinaProjeto;

class RelatorioOficinasController extends Controller
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
    public function show($id)
    {
        $oficina = OficinaProjeto::find($id);
        $turma = TurmaOficinaProjeto::all();
        

        $teste['dados'] = PresencaOficinaProjeto::select('estevePresente')->where("estevePresente", "=", $id)->count();
        $teste['dados2'] = OficinaProjeto::select("percentualMinimoFrequencia")->where('id', '=', $id)->get();
        $count = PresencaOficinaProjeto::where('estevePresente', '=', 1)->count();

        foreach($teste['dados2'] as $teste){
            echo "<br>";
            $value_percent = $teste->percentualMinimoFrequencia;
        } 

        $count = ($count * 100 )/ $value_percent;
        if($count < $value_percent){
            return $oficina->nome . " Teve um total de " . $count . "% de Reprovações";
        }else{
            return $oficina->nome . " Teve um total de " . $count . "% de Aprovações";
        }

        return view('relatorio-desistencia.index')->with('dados', $turma)
                                                ->with('dados2', $oficina);
;           
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
