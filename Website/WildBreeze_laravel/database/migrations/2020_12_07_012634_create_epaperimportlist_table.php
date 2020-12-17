<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEPaperImportListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_paper_import_list', function (Blueprint $table) {
            $table->bigIncrements('eil01', 18)->comment('發報編號:yyyymmddhhmmssmmm');
            $table->string('eil02')->comment('發報標題');
            $table->string('eil03')->comment('發報圖檔');
            $table->string('eil04')->comment('發送名單');
            $table->string('eil05')->comment('連結網址');
            $table->integer('eil06')->comment('點擊圖片數');
            $table->integer('eil07')->comment('開啟信件數');
            $table->string('ma01')->nullable()->comment('更新者帳號');
            $table->dateTime('lastTime')->comment('最後更新帳號');
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
        Schema::dropIfExists('e_paper_import_list');
    }
}
