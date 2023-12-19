<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->date('remind_date')->nullable();
            $table->string('before_day')->nullable();
            $table->bigInteger('reminder_category_id')->nullable()->unsigned()->index();
            $table->string('particular')->nullable();
            $table->string('frequency')->nullable();
            $table->string('level')->nullable();
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
        Schema::dropIfExists('reminders');
    }
}
