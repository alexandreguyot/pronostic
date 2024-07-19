<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionSportPivotTable extends Migration
{
    public function up()
    {
        Schema::create('competition_sport', function (Blueprint $table) {
            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id', 'competition_id_fk_9865387')->references('id')->on('competitions')->onDelete('cascade');
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id', 'sport_id_fk_9865387')->references('id')->on('sports')->onDelete('cascade');
        });

        Schema::create('competition_league', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id', 'league_id_fk_9865388')->references('id')->on('leagues')->onDelete('cascade');
            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id', 'competition_id_fk_9865388')->references('id')->on('competitions')->onDelete('cascade');
        });

        Schema::create('league_sport', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id', 'league_id_fk_986539')->references('id')->on('leagues')->onDelete('cascade');
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id', 'sport_id_fk_9865388')->references('id')->on('sports')->onDelete('cascade');
        });
    }
}
