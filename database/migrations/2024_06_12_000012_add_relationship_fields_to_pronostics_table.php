<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPronosticsTable extends Migration
{
    public function up()
    {
        Schema::table('pronostics', function (Blueprint $table) {
            $table->unsignedBigInteger('game_id')->nullable();
            $table->foreign('game_id', 'game_fk_9862345')->references('id')->on('games');
        });
    }
}
