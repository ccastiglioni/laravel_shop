<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            //$table->id('id_catg');
            $table->Increments('id_catg');
            $table->index(['id_catg']);
            $table->string('nome');
            $table->string('imagem','155')->nullable();
            $table->timestamps();
        });


        DB::table('categorias')->insert(
            array( 'nome' => 'Men')
        );
        DB::table('categorias')->insert(
            array( 'nome' => 'Women')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
