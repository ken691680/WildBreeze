<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_code', function (Blueprint $table) {
            $table->bigIncrements('dc01');
            $table->string('dc02')->comment('代碼名稱');
            $table->string('dc03')->comment('代碼類別:顏色,尺寸,付款方式');
            $table->string('ma01')->comment('更新者帳號');
            $table->dateTime('lastTime')->comment('最後更新時間');
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
        Schema::dropIfExists('data_code');
    }
}
