<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePronosticsTable extends Migration
{
    public function up()
    {
        Schema::create('pronostics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('score_home');
            $table->integer('score_exterior')->nullable();
            $table->integer('points')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
