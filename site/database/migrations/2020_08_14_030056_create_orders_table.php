<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('email');
            $table->string('cep', 20);
            $table->decimal('cost', 8, 2);
            $table->decimal('valor', 8, 2);
            $table->decimal('frete', 8, 2);
            $table->decimal('valorTotal', 8, 2);
            $table->string('paymentUrl');
            $table->string('metro2', 20);
            $table->integer('espessura');
            $table->integer('altura');
            $table->integer('largura');
            $table->integer('profundidade');
            $table->smallInteger('led');
            $table->smallInteger('espelho');
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
        Schema::dropIfExists('orders');
    }
}
