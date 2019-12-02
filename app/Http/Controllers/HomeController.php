<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projetos = Projeto::all();
        $oficinas = OficinaProjeto::all();
        $turmas = TurmaOficinaProjeto::all();
        return view('home')->with('projetos', $projetos)->with('oficinas', $oficinas)->with('turmas', $turmas);
    }

    public function notify(){
        return redirect()->route('notificacoes');
    }
}
