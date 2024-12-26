<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blancosbiologicostietos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('blancosbiologicostietos' , function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_bb_ti'); 
            $table->string('incidencia');
            $table->string('temp_aplica');
            $table->string('num_apli');
            $table->bigInteger('cultivo_bb_ti_id')->unsigned();
            $table->bigInteger('bbmother_bb_ti_id')->unsigned();
            $table->bigInteger('tieto_bb_ti_id')->unsigned();
            $table->timestamps();
            $table->foreign('cultivo_bb_ti_id')->references('id_cult_ti')->on('cultivostietos')->onDelete('cascade');
            $table->foreign('bbmother_bb_ti_id')->references('id')->on('blancosbiologicos')->onDelete('cascade');
            $table->foreign('tieto_bb_ti_id')->references('id')->on('tietos')->onDelete('cascade');
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
