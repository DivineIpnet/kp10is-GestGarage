<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiece extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('voiture_id');
            $table->foreign('voiture_id')
                  ->references('id')
                  ->on('voiture')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
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
        Schema::dropIfExists('piece');
    }
}
