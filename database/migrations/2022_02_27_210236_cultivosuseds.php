<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cultivosuseds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cultivosuseds' , function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_cult_use');
            $table->string('desc_cult_use');
            $table->bigInteger('participacion');
            $table->bigInteger('litros');
            $table->string('aplicaciones');
            $table->bigInteger('cultivos_cult_use')->unsigned();
            $table->bigInteger('cultivo_venta_id')->unsigned();
            $table->bigInteger('cultivo_prod_id')->unsigned();
            $table->timestamps();
            $table->foreign('cultivos_cult_use')->references('id')->on('cultivos')->onDelete('cascade');
            $table->foreign('cultivo_venta_id')->references('id')->on('ventas')->onDelete('cascade');
            $table->foreign('cultivo_prod_id')->references('id_prod_use')->on('productosuseds')->onDelete('cascade');

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
