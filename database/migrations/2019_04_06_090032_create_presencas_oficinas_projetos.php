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
            $table->bigIncrements('id');
            $table->date('data');
            $table->boolean('estevePresente')->default(false);
            $table->bigInteger('matricula_id')->unsigned();
            $table->bigInteger('turma_id')->unsigned();
            $table->foreign('matricula_id')->references('id')->on('matriculas_oficinas_projetos')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turmas_oficinas_projetos')->onDelete('cascade');
            $table->timestamps();
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
