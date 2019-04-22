<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Enums\UserType;

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
                'nome' => 'usuario teste',
                'publicado' => 1
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
    }
}
