<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_registration', function (Blueprint $table) {
            $table->bigIncrements('er01');
            $table->string('er02')->comment('姓名');
            $table->string('er03')->comment('信箱');
            $table->string('er04')->comment('手機');
            $table->string('er05')->comment('帳號後五碼');
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
        Schema::dropIfExists('events_registration');
    }
}
