<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRCategoriaPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_categoria_post', function (Blueprint $table) {
            $table->unsignedBigInteger('idPost');
            $table->unsignedBigInteger('idCategoria');

            $table->foreign('idPost')->references('id')->on('t_post');
            $table->foreign('idCategoria')->references('id')->on('a_categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('r_categoria_post');
    }
}
