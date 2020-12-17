<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEPaperClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_paper_class', function (Blueprint $table) {
            $table->string('epc01', 18)->comment('類別編號:yyyymmddhhmmssmmm');
            $table->string('epc02')->comment('類別名稱');
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
        Schema::dropIfExists('e_paper_class');
    }
}
