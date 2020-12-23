<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_record', function (Blueprint $table) {
            $table->bigIncrements('sr01');
            $table->string('sr02')->comment('留言主旨');
            $table->text('sr03')->comment('留言內容');
            $table->string('sr04')->default('否')->comment('是否刪除');
            $table->string('sr05')->comment('留言類型:商品退換貨，網友好評分享');
            $table->string('sr06')->comment('電子信箱');
            $table->string('sr07')->comment('姓名');
            $table->string('user_id')->comment('此為會員帳號');
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
        Schema::dropIfExists('service_record');
    }
}
