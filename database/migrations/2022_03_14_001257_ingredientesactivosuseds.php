<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ingredientesactivosuseds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ingredientesactivosuseds', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id_ing_act_use');
            $table->bigInteger('precio');
            $table->string('marcacomercial');
            $table->string('porcentaje');
            $table->string('desc_ing_act_use');
            $table->string('dosis');
            $table->bigInteger('tieto_ing_act_use')->unsigned();
            $table->bigInteger('ingmother_ing_act_id')->unsigned();
            $table->bigInteger('cult_ing_act_id')->unsigned();
            $table->bigInteger('bb_ing_act_id')->unsigned();
            $table->timestamps();
            $table->foreign('bb_ing_act_id')->references('id_bb_ti')->on('blancosbiologicostietos')->onDelete('cascade');
            $table->foreign('tieto_ing_act_use')->references('id')->on('tietos')->onDelete('cascade');
            $table->foreign('ingmother_ing_act_id')->references('id')->on('ingredientesactivos')->onDelete('cascade');
            $table->foreign('cult_ing_act_id')->references('id_cult_ti')->on('cultivostietos')->onDelete('cascade');

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
