<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteBannerCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_banner_count', function (Blueprint $table) {
            $table->bigIncrements('wbc01');
            $table->dateTime('wbc02')->comment('廣告位置:首頁上方廣告,左邊廣告,野遊勝地上方廣告,熱門商品下方廣告,最新商品下方廣告,會員中心下方廣告,客服中心下方廣告');
            $table->string('wbc03')->comment('Session_Id');
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
        Schema::dropIfExists('website_banner_count');
    }
}
