<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productosuseds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('productosuseds' , function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_prod_use');
            $table->string('desc_prod_use');
            $table->bigInteger('productos_prod_use')->unsigned();
            $table->bigInteger('producto_venta_id')->unsigned();
            $table->timestamps();
            $table->foreign('productos_prod_use')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('producto_venta_id')->references('id')->on('ventas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
