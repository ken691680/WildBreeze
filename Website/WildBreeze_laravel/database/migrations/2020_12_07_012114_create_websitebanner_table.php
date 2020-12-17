<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_banner', function (Blueprint $table) {
            $table->bigIncrements('wb01');
            $table->string('wb02')->comment('名稱');
            $table->string('wb03')->nullable()->comment('圖檔');
            $table->string('wb04')->nullable()->comment('連結網址');
            $table->dateTime('wb05')->comment('上架時間');
            $table->dateTime('wb06')->comment('下架時間');
            $table->dateTime('wb07')->nullable()->comment('廣告位置:首頁上方廣告,左邊廣告,野遊勝地上方廣告,熱門商品下方廣告,最新商品下方廣告,會員中心下方廣告,客服中心下方廣告');
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
        Schema::dropIfExists('website_banner');
    }
}
