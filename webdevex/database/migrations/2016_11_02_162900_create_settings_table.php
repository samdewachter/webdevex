<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('beginPeriod1');
            $table->string('endPeriod1');
            $table->string('beginPeriod2');
            $table->string('endPeriod2');
            $table->string('beginPeriod3');
            $table->string('endPeriod3');
            $table->string('beginPeriod4');
            $table->string('endPeriod4');
            $table->string('now');
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
        Schema::dropIfExists('settings');
    }
}
