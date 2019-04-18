<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Enums\UF;

class CreateEnderecoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_usuario', function (Blueprint $table) {
            $table->integer('id_usuario')->unsigned();
            $table->string('rua')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('apto')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->string('cidade');
            $table->tinyInteger('uf')->unsigned()->default(UF::NaoInformado);
            $table->string('nacionalidade')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        Schema::table('endereco_usuario', function (Blueprint $table) {            
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco_usuario');
    }
}
