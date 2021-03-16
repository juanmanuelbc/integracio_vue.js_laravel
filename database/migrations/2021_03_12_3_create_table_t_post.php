<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_post', function (Blueprint $table) {
            $table->id();
            $table->string('titol');
            $table->string('imatge');
            $table->string('descripcio');
            $table->text('contingut');
            $table->timestamps();

            $table->unsignedBigInteger('idUsuari')->nullable();

            $table->foreign('idUsuari')->references('id')->on('t_usuari');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_post');
    }
}
