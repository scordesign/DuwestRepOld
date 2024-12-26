<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ventaterminas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ventaterminas' , function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_ventatermina');
            $table->bigInteger('estado');
            $table->bigInteger('id_venta')->unsigned();
            $table->timestamps();
            $table->foreign('id_venta')->references('id')->on('ventas')->onDelete('cascade');
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
