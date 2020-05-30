<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGameMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_game_master', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('game_id');
            $table->integer('l_num')->nullable();
            $table->integer('r_num')->nullable();
            $table->string('pair_num')->nullable();
            $table->boolean('is_left')->nullable();
            $table->boolean('is_right')->nullable();
            $table->boolean('is_pair')->nullable();
            $table->double('bet_amount',8,2);
            $table->string('flags',5)->default('00000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_game_master');
    }
}
