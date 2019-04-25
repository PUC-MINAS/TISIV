<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuscasAtivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buscas_ativas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('data_criacao');
            $table->boolean('busca_realizada')->default(false);
            $table->date('data_busca_realizada')->nullable();
            $table->text('observacao')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->timestamps();
        });

        Schema::table('buscas_ativas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buscas_ativas');
    }
}
