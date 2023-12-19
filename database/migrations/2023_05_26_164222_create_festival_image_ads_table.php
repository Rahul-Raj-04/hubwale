<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalImageAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_image_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_mobile_number')->nullable();
            $table->string('client_company_name')->nullable();
            $table->timestamp('expiry_date')->nullable();
            $table->string('is_active')->nullable();
            $table->string('payment_amount')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('festival_image_ads');
    }
}
