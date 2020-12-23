<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('新聞標題');
            $table->text('content')->comment('新聞內容');
            $table->string('img')->comment('上傳圖片');
            $table->dateTime('added_time')->comment('上架時間');
            $table->dateTime('time_off')->comment('下架時間');
            $table->string('user_id')->comment('帳號');
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
        Schema::dropIfExists('news');
    }
}
