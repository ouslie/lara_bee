<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Colonies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colonies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('id_type')->nullable($value = true);
            $table->year('birthyear')->nullable($value = true)	;
            $table->integer('id_parent')->nullable($value = true)	;
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
        Schema::drop('colonies');
    }
}
