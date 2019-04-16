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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('educador')->nullable();
            $table->text('horario')->nullable();
            $table->integer('maximoAlunos')->nullable();
            $table->integer('idadeMinima')->nullable();
            $table->integer('idadeMaxima')->nullable();
            $table->integer('id_oficinas_projetos')->unsigned();
            $table->foreign('id_oficinas_projetos')->references('id')->on('oficinas_projetos')->onDelete('cascade');
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
