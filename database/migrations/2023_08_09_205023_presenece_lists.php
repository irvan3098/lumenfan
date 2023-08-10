<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PreseneceLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presenece_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_users');
            $table->char('type', 1)->comment('0: OUT, 1: IN');
            $table->boolean('is_prove')->default(false);
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('presenece_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_users');
            $table->char('type', 1)->comment('0: OUT, 1: IN');
            $table->boolean('is_prove')->default(false);
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users');
        });
    }
}
