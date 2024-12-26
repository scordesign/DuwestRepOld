<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productosxusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('productosxusers', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_usu')->unsigned();
            $table->bigInteger('id_produc')->unsigned();
            $table->timestamps();
            $table->foreign('id_usu')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_produc')->references('id')->on('productos')->onDelete('cascade');

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
