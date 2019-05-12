<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Enums\UserType;
use App\Enums\TipoAquisicao;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filiais')->insert([
            ['nome' => 'Sede Matriz', 'logadouro' => 'Praça Juliano Maria', 'numero' => '1', 'bairro' => 'Planalto', 'cep' => '33200000', 'uf' => 0]
        ]);

        DB::table('users')->insert([
            ['name' => 'AdminTest', 'email' => 'admin@gmail.com', 'password' => Hash::make('admintest'), 'tipo' => UserType::Adm, 'id_filiais' => 1]
        ]);

        DB::table('usuario')->insert([
            [
                'nome' => 'usuario teste'
            ]
        ]);

        DB::table('programas')->insert([
            ['nome' => 'Programa Teste', 'objetivo' => 'Fazer um programa teste', 'id_filiais' => 1]
        ]);

        DB::table('projetos')->insert([
            [
                'nome' => 'Projeto Teste',
                'objetivo' => 'Fazer um projeto teste',
                'descricao' => 'Descricao do projeto teste',
                'inicio' => date('Y-m-d'),
                'fim' => date('Y-m-d', strtotime('+6 month')),
                'id_programas' => 1
            ]
        ]);

        DB::table('oficinas_projetos')->insert([
            [
                'nome' => 'Oficina teste',
                'local' => 'local teste',
                'cargaHoraria' => 20,
                'percentualMinimoFrequencia' => 70,
                'inicio' => date('Y-m-d'),
                'fim' => date('Y-m-d', strtotime('+3 month')),
                'ementa' => 'ementa de teste',
                'id_projetos' => 1
            ]
        ]);

        DB::table('turmas_oficinas_projetos')->insert([
            [
                'educador' => 'Professor',
                'horario' => 'Segundas e Quartas, de 9h as 11h',
                'maximoAlunos' => 10,
                'idadeMinima' => null,
                'idadeMaxima' => null,
                'id_oficinas_projetos' => 1
            ]
        ]);

        DB::table('matriculas_oficinas_projetos')->insert([
            [
                'data_matricula' => date('Y-m-d', strtotime('-3 week')),
                'id_turmas' => 1,
                'id_usuario' => 1
            ]
        ]);

        DB::table('aquisicoes')->insert([
            //indicadores usuário
            [
                'nome' => 'Conscientes de seus direitos e deveres',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Valorizando o conhecimento e o saber social',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Usando adequadamente os espaços e recursos coletivos, bens e serviços públicos',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Demonstrando atitudes de conservação da natureza e do ambiente onde vivem',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Apresentando cuidados com a aparência',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Expressando-se de forma fluente e livre nas atividades; Espontaneidade',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Buscando informações',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Interessados e envolvidos nas atividades',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Participando de campanhas e atividades de saúde e preservação do meio ambiente. Dinamismo',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Assumindo autoria de ideias e invenções solucionando problemas. Autonomia. Inovação',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Defendendo seu próprio ponto de vista e respeitando o ponto de vista do outro',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Comunicativos',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Aprendendo a ser, a conhecer, a fazer e a conviver',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Utilizando conhecimentos em contextos diferentes',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Com iniciativa',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Convivendo satisfatoriamente com a família e a comunidade. Entrosamento',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Construindo coletivamente as regras',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            [
                'nome' => 'Participando e cientes da avaliação e planejamento do projeto educativo',
                'tipo_aquisicao' => TipoAquisicao::IndicadorUsuario
            ],
            //indicadores da familia
            [
                'nome' => 'Envolvida',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Estabelecendo boas relações com a equipe',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Participantes na organização do programa de atendimento',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Informada sobre o processo socioeducativo',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Presente e participante nas reuniões e eventos promovidos pela entidade',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Criativa e cooperativa em relação ao trabalho desenvolvido pela entidade',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Satisfeita com o desenvolvimento das crianças e adolescentes',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Participativa nas atividades promovidas pela entidade e com mudança de postura em relação à educação das crianças e adolescentes',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Inovando nas estratégias de relacionamento entre instituições e família',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Aumento do interesse, da presença e das ações conjuntas entre membros da família, escola e comunidade',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Informada sobre os princípios e valores da entidade e cooperativa com o trabalho desenvolvido',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ],
            [
                'nome' => 'Ciente de seu papel e cooperando no trabalho educativo desenvolvido pela entidade',
                'tipo_aquisicao' => TipoAquisicao::IndicadorFamiliares
            ]
            
        ]);
    }
}
