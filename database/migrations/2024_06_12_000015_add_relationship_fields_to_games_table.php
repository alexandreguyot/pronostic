<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGamesTable extends Migration
{
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->unsignedBigInteger('competition_id')->nullable();
            $table->foreign('competition_id', 'competition_fk_9862335')->references('id')->on('competitions');
            $table->unsignedBigInteger('home_team_id')->nullable();
            $table->foreign('home_team_id', 'home_team_fk_9862338')->references('id')->on('teams');
            $table->unsignedBigInteger('exterior_team_id')->nullable();
            $table->foreign('exterior_team_id', 'exterior_team_fk_9862340')->references('id')->on('teams');
            $table->unsignedBigInteger('sport_id')->nullable();
            $table->foreign('sport_id', 'sport_fk_9865388')->references('id')->on('sports');
        });
    }
}
