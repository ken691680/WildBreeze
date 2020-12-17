<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEPaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_paper', function (Blueprint $table) {
            $table->bigIncrements('ep01', 18)->comment('發報編號:yyyymmddhhmmssmmm');
            $table->string('ep02')->comment('發報標題');
            $table->text('ep03')->comment('發報內容');
            $table->text('ep04')->comment('連結網址');
            $table->integer('ep05')->comment('點擊圖片數');
            $table->integer('ep06')->comment('開啟信件數');
            $table->string('ep07')->comment('電子報類別編號');
            $table->string('ma01')->nullable()->comment('更新者帳號');
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
        Schema::dropIfExists('e_paper');
    }
}
