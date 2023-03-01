<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('id_prod');                      //unsigned nao aceita valores negativos!
            $table->foreignId('categoria_id');
            $table->string('nome');              // por default ele coloca Null = NO
            $table->string('tamanho',80);              // por default ele coloca Null = NO
            $table->mediumText('descricao')->nullable(); // set que permite receber valores Nulos!
            $table->string('imagem')->default('0');
            $table->decimal('valor',5,2)->default(1);
            $table->enum('ativo', ['S', 'N']);
            $table->enum('destaque', ['S', 'N']);
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
        Schema::dropIfExists('produtos');
    }
}
