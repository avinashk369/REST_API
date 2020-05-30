<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_master', function (Blueprint $table) {
            $table->id();
            $table->string('name',20);
            $table->string('tag_line',100);
            $table->integer('prize');
            $table->boolean('is_offer');
            $table->bigInteger('offer_id')->nullable();
            $table->timestamp('result_time', 0);
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
        Schema::dropIfExists('game_master');
    }
}
