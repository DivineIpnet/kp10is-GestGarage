<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoiture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('voiture', function (Blueprint $table) {
                       $table->id();
                       $table->string('image');
                       $table->text('matricule');
                       $table->text('status');
                       $table->unsignedBigInteger('type_voiture_id');
                       $table->foreign('type_voiture_id')
                             ->references('id')
                             ->on('typevoiture')
                             ->onDelete('cascade')
                             ->onUpdate('cascade');;
                       $table->unsignedBigInteger('marque_id');
                       $table->foreign('marque_id')
                             ->references('id')
                             ->on('marque')
                             ->onDelete('cascade')
                             ->onUpdate('cascade');
                       $table->unsignedBigInteger('proprietaire_id');
                       $table->foreign('proprietaire_id')
                             ->references('id')
                             ->on('proprietaire')
                             ->onDelete('cascade')
                             ->onUpdate('cascade');
                       $table->unsignedBigInteger('piece_id');
                       $table->foreign('piece_id')
                             ->references('id')
                             ->on('piece')
                             ->onDelete('cascade')
                             ->onUpdate('cascade');

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
        Schema::dropIfExists('voiture');
    }
}
