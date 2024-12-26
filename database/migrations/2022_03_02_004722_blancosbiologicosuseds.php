<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blancosbiologicosuseds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('blancosbiologicosuseds' , function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_bb_use');
            $table->string('desc_bb_use');
            $table->bigInteger('blancobiologico_bb_use')->unsigned();
            $table->bigInteger('blancobiologico_venta_id')->unsigned();
            $table->bigInteger('blancobiologico_cultivo_id')->unsigned();
            $table->timestamps();
            $table->foreign('blancobiologico_bb_use')->references('id')->on('blancosbiologicos')->onDelete('cascade');
            $table->foreign('blancobiologico_venta_id')->references('id')->on('ventas')->onDelete('cascade');
            $table->foreign('blancobiologico_cultivo_id')->references('id_cult_use')->on('cultivosuseds')->onDelete('cascade');
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
