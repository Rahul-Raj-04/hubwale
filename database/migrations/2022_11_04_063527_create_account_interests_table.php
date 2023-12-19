<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_interests', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('interest')->nullable();
            $table->string('interest_ac')->nullable();
            $table->string('tds_ac')->nullable();
            $table->string('cr_db')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_interests');
    }
}
