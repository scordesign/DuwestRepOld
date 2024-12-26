<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Municipiosusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('municipiosusers', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('id_usu')->unsigned();
            $table->bigInteger('id_muni')->unsigned();
            $table->timestamps();
            $table->foreign('id_usu')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_muni')->references('id')->on('municipios')->onDelete('cascade');

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
