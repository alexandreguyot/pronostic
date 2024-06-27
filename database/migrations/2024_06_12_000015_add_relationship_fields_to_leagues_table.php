<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLeaguesTable extends Migration
{
    public function up()
    {
        Schema::table('leagues', function (Blueprint $table) {
            $table->unsignedBigInteger('competition_id')->nullable();
            $table->foreign('competition_id', 'competition_fk_9865642')->references('id')->on('competitions');
            $table->unsignedBigInteger('sport_id')->nullable();
            $table->foreign('sport_id', 'sport_fk_9865643')->references('id')->on('sports');
        });
    }
}
