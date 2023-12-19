<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstSalesSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_sales_setup', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['gst_commodity','default']);

            $table->unsignedBigInteger('gst_commodity_id')->index()->nullable();
            $table->foreign('gst_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');

            $table->unsignedBigInteger('sales_purchase_ac_id')->index()->nullable();
            $table->foreign('sales_purchase_ac_id')->references('id')->on('accounts')->onDelete('cascade');

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
        Schema::dropIfExists('gst_sales_setup');
    }
}
