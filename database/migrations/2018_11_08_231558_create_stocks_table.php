<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_item')->unsigned();
            $table->foreign('id_item')->references('id')->on('items');
            $table->integer('id_house')->unsigned();
            $table->foreign('id_house')->references('id')->on('houses')->onDelete('cascade');
            $table->integer('stock');
            $table->decimal('volumen')->default(null)->nullable();
            $table->text('unidad')->default(null)->nullable();
            $table->integer('cantidad_ideal');
            $table->integer('usuario_modifica')->unsigned();
            $table->foreign('usuario_modifica')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('stocks');
    }
}
