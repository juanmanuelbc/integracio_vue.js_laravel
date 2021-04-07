<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTUsuari extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_usuari', function (Blueprint $table) {
            $table->string("dni");
            $table->string("email");
            $table->string("telefon");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_usuari', function (Blueprint $table) {
            
        });
    }
}
