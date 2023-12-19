<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateECommerceOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_commerce_orders', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('user_id');
            $table->string('name');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('pincode')->nullable();
            $table->string('payment_method')->default('cash');
            $table->string('payment_status_id')->nullable();
            $table->string('order_status_id')->nullable();
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
        Schema::dropIfExists('e_commerce_orders');
    }
}
