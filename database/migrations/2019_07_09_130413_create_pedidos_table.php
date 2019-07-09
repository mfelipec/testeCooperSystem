<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('produto_id');
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 8, 2)->default(0.00);
            $table->text('solicitante', 200);
            $table->text('cep', 8);
            $table->text('uf', 2);
            $table->text('municipio', 100);
            $table->text('bairro', 100);
            $table->text('rua', 200);
            $table->text('numero', 20)->nullable(true);
            $table->text('despachante', 200);
            $table->integer('situacao_pedido')->default(1);
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedidos');
    }
}
