<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cultivostietos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cultivostietos' , function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_cult_ti');
            $table->string('desc_cult_ti');
            $table->bigInteger('hectareas');
            $table->bigInteger('cultmother_cult_ti_id')->unsigned();
            $table->bigInteger('tieto_cult_ti_id')->unsigned();
            $table->timestamps();
            $table->foreign('cultmother_cult_ti_id')->references('id')->on('cultivos')->onDelete('cascade');
            $table->foreign('tieto_cult_ti_id')->references('id')->on('tietos')->onDelete('cascade');
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
