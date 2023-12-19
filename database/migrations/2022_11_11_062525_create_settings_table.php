<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->string('menu')->nullable();
            $table->string('sub_menu')->nullable();
            $table->string('header')->nullable();
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->string('type')->nullable();
            $table->string('description')->nullable();
            $table->string('option')->nullable();
            $table->string('validation')->nullable();
            $table->softDeletes();
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
