<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasOficinasProjetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas_oficinas_projetos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('turma_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->unique(['turma_id', 'usuario_id']);
            $table->date('data_matricula');
            $table->boolean('desistente')->default(false);
            $table->date('data_desistencia')->nullable();
            $table->boolean('concluiu')->default(false);
            $table->date('data_conclusao')->nullable();
            $table->foreign('turma_id')->references('id')->on('turmas_oficinas_projetos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('matriculas_oficinas_projetos');
    }
}
