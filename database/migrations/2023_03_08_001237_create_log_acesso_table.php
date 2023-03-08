<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAcessoTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('log_acessos', function (Blueprint $table) {
            $table->increments('id_log');
            $table->foreignId('user_id');
            $table->foreignId('produto_id');
            $table->timestamp('date_create');
            $table->smallInteger('qtd_acessos');
            $table->string('ip',150)->nullable();
            $table->string('descricao',150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_acessos');
    }
}

