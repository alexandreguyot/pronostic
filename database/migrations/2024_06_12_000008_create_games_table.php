<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tour')->nullable();
            $table->datetime('date_time');
            $table->integer('home_score')->nullable();
            $table->integer('exterior_score')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
