<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresencasOficinasProjetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presencas_oficinas_projetos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('data');
            $table->boolean('estevePresente')->default(false);
            $table->boolean('justificada')->nullable();
            $table->string('justificativa')->nullable();
            $table->integer('id_matriculas')->unsigned();
            $table->integer('id_turmas')->unsigned();
            $table->timestamps();
        });

        Schema::table('presencas_oficinas_projetos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('id_matriculas')->references('id')->on('matriculas_oficinas_projetos')->onDelete('cascade');
            $table->foreign('id_turmas')->references('id')->on('turmas_oficinas_projetos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presencas_oficinas_projetos');
    }
}
