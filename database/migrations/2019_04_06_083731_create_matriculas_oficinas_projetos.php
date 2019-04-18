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
            $table->engine = 'InnoDB';
            $table->increments('id');            
            $table->date('data_matricula');
            $table->boolean('desistente')->default(false);
            $table->date('data_desistencia')->nullable();
            $table->boolean('concluiu')->default(false);
            $table->date('data_conclusao')->nullable();
            $table->integer('id_turmas')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();
        });

        Schema::table('matriculas_oficinas_projetos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unique(['id_turmas', 'id_usuario']);
            $table->foreign('id_turmas')->references('id')->on('turmas_oficinas_projetos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
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
