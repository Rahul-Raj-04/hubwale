<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountAddressDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_address_details', function (Blueprint $table) {
            $table->id();
            $table->string('contact_person')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('pincode')->nullable();
            $table->text('area')->nullable();
            $table->bigInteger('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('category')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('phone_no_r')->nullable();
            $table->string('fax')->nullable();
            $table->string('factory_no')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('account_address_details');
    }
}
