<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('league_user', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id', 'league_id_fk_9861817')->references('id')->on('leagues')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_9861817')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
