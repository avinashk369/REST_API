<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKycMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kyc_master', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('pan_num')->unique()->nullable();
            $table->string('bank_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_num')->unique()->nullable();
            $table->boolean('pan_verified');
            $table->boolean('bank_verified');
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
        Schema::dropIfExists('kyc_master');
    }
}
