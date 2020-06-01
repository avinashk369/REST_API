<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_master', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->double('cash_amount',8,2)->default(0);
            $table->double('promo_amount',8,2)->default(0);
            $table->double('avl_amount',8,2)->default(0);
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
        Schema::dropIfExists('wallet_master');
    }
}
