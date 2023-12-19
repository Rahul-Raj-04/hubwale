<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateExchangeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_exchange_masters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('currency_master_id')->nullable()->unsigned()->index();
            $table->date('date')->nullable();
            $table->string('standard_rate')->nullable();
            $table->string('selling_rate')->nullable();
            $table->string('buyung_rate')->nullable();
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
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
        Schema::dropIfExists('rate_exchange_masters');
    }
}
