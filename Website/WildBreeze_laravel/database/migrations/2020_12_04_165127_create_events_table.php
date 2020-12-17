<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('ev01');
            $table->string('ev02')->comment('標題');
            $table->text('ev03')->comment('景點介紹');
            $table->string('ev04')->comment('上傳圖片1');
            $table->string('ev05')->comment('上傳圖片2');
            $table->string('ev06')->comment('上傳圖片3');
            $table->dateTime('ev07')->comment('活動日期');
            $table->text('ev08')->comment('交通');
            $table->integer('ev09')->default(0)->comment('名額');
            $table->string('ev10')->comment('費用');
            $table->text('ev11')->comment('行程說明');
            $table->text('ev12')->comment('報名方式');
            $table->string('ev13')->default(false)->comment('是否開放線上報名');
            $table->string('ev14')->comment('銀行代號');
            $table->string('ev15')->comment('匯款帳號');
            $table->string('ev16')->comment('戶名');
            $table->dateTime('ev17')->comment('上架時間');
            $table->dateTime('ev18')->comment('下架時間');
            $table->string('ma01')->nullable()->comment('帳號');
            $table->timestamp('lastTime')->comment('最後更新時間');
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
        Schema::dropIfExists('events');
    }
}
