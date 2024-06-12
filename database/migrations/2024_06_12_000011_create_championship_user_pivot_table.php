<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('championship_user', function (Blueprint $table) {
            $table->unsignedBigInteger('championship_id');
            $table->foreign('championship_id', 'championship_id_fk_9861817')->references('id')->on('championships')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_9861817')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
