<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoImagensTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('produto_imagens', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->unsignedBigInteger('produto_id');
            $table->string('nome_img');
            $table->foreign('produto_id')->references('id_prod')->on('produtos');
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
        Schema::table('produto_imagens', function (Blueprint $table) {
                        // [tabela]_[coluna]_foreign : imagens_produto_id_foreign
        $table->dropForeign('produto_imagens_produto_id_foreign');
        $table->dropColumn('produto_id');
        });

        Schema::dropIfExists('produto_imagens');
    }
}


