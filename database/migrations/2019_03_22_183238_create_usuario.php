<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Enums\Escolaridade;
use App\Enums\FormaDivulgacao;
use App\Enums\RacaCor;
use App\Enums\PovoTradicional;
use App\Enums\EstadoCivil;

class CreateUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('sexo')->nullable();
            $table->date('dta_nasc')->nullable();
            $table->string('cpf')->unique()->nullable();
            $table->string('rg')->unique()->nullable();
            $table->string('certidao_nasc')->nullable();
            $table->tinyInteger('estado_civil')->unsigned()->default(EstadoCivil::NaoInformado);
            $table->tinyInteger('escolaridade')->unsigned()->default(Escolaridade::NaoInformado);
            $table->string('profissao')->nullable();
            $table->string('telefone')->nullable();
            $table->string('num_wpp')->nullable();
            $table->string('contato_emerg')->nullable();
            $table->boolean('cras')->nullable();
            $table->string('num_cad')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('alergias')->nullable();
            $table->tinyInteger('descobriu_por')->unsigned()->default(FormaDivulgacao::NaoInformado);
            $table->string('observacao')->nullable();
            $table->tinyInteger('raca_cor')->unsigned()->default(RacaCor::NaoInformado);
            $table->tinyInteger('povo_tradicional')->unsigned()->default(PovoTradicional::NaoPertence);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
