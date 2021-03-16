<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTComentari extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_comentari', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->timestamps();

            $table->unsignedBigInteger('idPost');
            $table->unsignedBigInteger('idUsuari')->nullable();

            $table->foreign('idPost')->references('id')->on('t_post');
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
        Schema::dropIfExists('t_comentari');
    }
}
