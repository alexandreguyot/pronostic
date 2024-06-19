<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueCompetitionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('league_competition', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id', 'league_id_fk_9861818')->references('id')->on('leagues')->onDelete('cascade');
            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id', 'competition_id_fk_9861818')->references('id')->on('competitions')->onDelete('cascade');
        });
    }
}
