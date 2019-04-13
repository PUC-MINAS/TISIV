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

        DB::table('programas')->insert([
            ['nome' => 'Programa', 'objetivo' => 'Fazer um programa', 'id_filiais' => 1]
        ]);
    }
}
