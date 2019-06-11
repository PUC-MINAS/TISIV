<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Auth;
use App\User;
use App\usuario;
use App\Projeto;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;
use App\PresencaOficinaProjeto;
use App\MatriculaOficinaProjeto;
use App\Notifications\NotificacaoBuscaAtiva;

use Illuminate\Http\Request;

class NotificacoesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficiados = self::recuperaBeneficiadosBuscaAtiva();
        $usuarioLogado = Auth::user();

        self::notificaUsuarioLogado($usuarioLogado, $beneficiados);

        return redirect()->route('home');
    }

    /**
     * Retorna lista com os dados dos beneficiados para busca ativa
     */
    public static function recuperaBeneficiadosBuscaAtiva()
    {

        $beneficiadosBuscaAtiva = usuario::whereIn(
            'id',
            MatriculaOficinaProjeto::whereIn(
                'id',
                self::recuperaListasPresenca()
            )
            ->get('id')
        )
        ->get();

        return $beneficiadosBuscaAtiva;
    }

    /**
     * Retorna o número de matrícula dos beneficiados que têm 3 ou mais faltas
     * e estão matriculados em cursos que estão em andamento
    */
    public static function recuperaListasPresenca()
    {

        $listaPresencas = PresencaOficinaProjeto::select(
            \DB::raw('id_matriculas, count(id) as total')
        )
        ->whereIn(
            'id_matriculas',
            MatriculaOficinaProjeto::whereIn(
                'id_turmas',
                TurmaOficinaProjeto::whereIn(
                    'id_oficinas_projetos',
                    OficinaProjeto::whereIn(
                        'id_projetos',
                        Projeto::whereDate(
                            'fim',
                            '>',
                            Carbon::today()->toDateString()
                        )
                        ->get(['id'])
                    )
                    ->get(['id'])
                )
                ->get(['id'])
            )
            ->get(['id'])
        )
        ->where('estevePresente', 0)
        ->groupBy('id_matriculas')
        ->get()
        ->where('total', '>=', 3)
        ->pluck('id_matriculas');

        return $listaPresencas;
    }

    public static function notificaUsuarioLogado($usuarioLogado, $beneficiados)
    {

        if($beneficiados->isNotEmpty()){
            foreach($beneficiados as $beneficiado){
                $usuarioLogado->notify(new NotificacaoBuscaAtiva($beneficiado));
            }
        }
    }

    public function recuperaNotificacoesUsuario (){
        $notificacoesUsuario = Auth::user()->unreadNotifications->unique('data');

        return view('busca-ativa.index', ['beneficiados' => $notificacoesUsuario]);
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->route('home');
    }

    public function markAsRead($id)
    {
        Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
        return redirect()->route('notificacoes-ativas');
    }

}
