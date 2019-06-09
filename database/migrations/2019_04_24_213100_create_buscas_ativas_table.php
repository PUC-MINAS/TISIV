<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Enums\StatusBuscaAtiva;

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
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->text('observacao')->nullable();
            $table->tinyInteger('status')->unsigned()->default(StatusBuscaAtiva::NaoIniciada);
            $table->date('data_inicio');
            $table->date('data_conclusao')->nullable();
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
