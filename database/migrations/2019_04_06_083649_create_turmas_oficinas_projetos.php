<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasOficinasProjetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas_oficinas_projetos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('educador')->nullable();
            $table->string('horario');
            $table->integer('maximoAlunos')->nullable();
            $table->integer('idadeMinima')->nullable();
            $table->integer('idadeMaxima')->nullable();
            $table->bigInteger('oficina_projeto_id')->unsigned();
            $table->foreign('oficina_projeto_id')->references('id')->on('oficinas_projetos')->onDelete('cascade');
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
        Schema::dropIfExists('turmas_oficinas_projetos');
    }
}
