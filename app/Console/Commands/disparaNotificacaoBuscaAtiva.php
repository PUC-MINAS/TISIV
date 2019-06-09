<?php

namespace App\Console\Commands;

use Carbon\Carbon;

use App\User;
use App\usuario;
use App\Projeto;
use App\OficinaProjeto;
use App\TurmaOficinaProjeto;
use App\PresencaOficinaProjeto;
use App\MatriculaOficinaProjeto;
use App\Notifications\NotificacaoBuscaAtiva;

use Illuminate\Console\Command;

class disparaNotificacaoBuscaAtiva extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispara notificações de busca ativa para os beneficiados ausentes há 3 dias.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $usuariosSistema = User::all();

       /**
        * @todo alterar a classe de notificação para aceitar uma coleção de beneficiados como parâmetro
        */
       foreach ($usuariosSistema as $usuarioSistema) {
           $usuarioSistema->notify(new NotificacaoBuscaAtiva(self::recuperaBeneficiadosBuscaAtiva()));
       }
    }

    /**
     * Retorna lista com os dados dos beneficiados para busca ativa
     */
    public static function recuperaBeneficiadosBuscaAtiva(){

        $beneficiadosBuscaAtiva = usuario::whereIn(
            'id',
            MatriculaOficinaProjeto::whereIn(
                'id',
                self::recuperaListasPresenca()
            )
            ->get()
        )
        ->get();

        return $beneficiadosBuscaAtiva;
    }

    /**
     * Retorna o número de matrícula dos beneficiados que têm 3 ou mais faltas
     * e estão matriculados em cursos que estão em andamento
    */
    public static function recuperaListasPresenca(){

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
}
