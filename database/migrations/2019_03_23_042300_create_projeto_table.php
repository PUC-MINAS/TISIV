<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->text('objetivo')->nullable();
            $table->date('inicio');
            $table->date('fim');
            $table->text('descricao')->nullable();
            $table->integer('id_programas')->unsigned();
            $table->timestamps();
        });

        Schema::table('projetos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('id_programas')->references('id')->on('programas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos');
    }
}
