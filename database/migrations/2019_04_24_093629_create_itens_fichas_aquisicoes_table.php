<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensFichasAquisicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_fichas_aquisicoes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id_aquisicoes')->unsigned();
            $table->integer('id_fichas_aquisicoes')->unsigned();
            $table->primary(['id_aquisicoes', 'id_fichas_aquisicoes'], 'id_aquisicoes_id_fichas');
            $table->boolean('atende')->default(false);
            $table->timestamps();
        });

        Schema::table('itens_fichas_aquisicoes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->foreign('id_aquisicoes')->references('id')->on('aquisicoes')->onDelete('cascade');
            $table->foreign('id_fichas_aquisicoes')->references('id')->on('fichas_aquisicoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_fichas_aquisicoes');
    }
}
