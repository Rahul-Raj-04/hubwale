<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_books', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('contact_person')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('states')->nullable();
            $table->string('pincode')->nullable();
            $table->string('area')->nullable();
            $table->unsignedBigInteger('address_category_id')->nullable();
            $table->foreign('address_category_id')->references('id')->on('address_categories')->nullable();
            $table->string('phone_1_o')->nullable();
            $table->string('phone_1_r')->nullable();
            $table->string('phone_2_o')->nullable();
            $table->string('phone_2_r')->nullable();
            $table->string('phone_f')->nullable();
            $table->string('fax_1')->nullable();
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('address_books');
    }
}
