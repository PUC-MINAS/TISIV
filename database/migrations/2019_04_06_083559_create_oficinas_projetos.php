<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasProjetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas_projetos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->string('local')->nullable();
            $table->integer('cargaHoraria')->nullable();
            $table->double('percentualMinimoFrequencia', 8, 2)->nullable();
            $table->date('inicio');
            $table->date('fim');
            $table->text('ementa')->nullable();
            $table->integer('id_projetos')->unsigned();
            $table->timestamps();
        });

        Schema::table('oficinas_projetos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('id_projetos')->references('id')->on('projetos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficinas_projetos');
    }
}
