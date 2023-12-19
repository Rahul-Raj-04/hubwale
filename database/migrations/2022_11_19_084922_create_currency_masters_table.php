<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_masters', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->nullable();
            $table->string('gc_code')->nullable();
            $table->bigInteger('country_id')->nullable()->unsigned()->index();
            $table->string('integer')->nullable();
            $table->string('fraction')->nullable();
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
        Schema::dropIfExists('currency_masters');
    }
}
