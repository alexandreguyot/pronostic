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
    }
}
