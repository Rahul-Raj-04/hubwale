<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalePurchaseTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_purchase_taxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_account_id')->index()->nullable();
            $table->foreign('sale_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('discount')->nullable();
            $table->string('freight')->nullable();
            $table->string('central_tax')->nullable();
            $table->string('state_ut_tax')->nullable();
            $table->string('round_off')->nullable();
            $table->unsignedBigInteger('sale_entry_id')->index()->nullable();
            $table->foreign('sale_entry_id')->references('id')->on('sale_entries')->onDelete('cascade');
            $table->unsignedBigInteger('purchase_entry_id')->index()->nullable();
            $table->foreign('purchase_entry_id')->references('id')->on('purchase_entries')->onDelete('cascade');
            $table->unsignedBigInteger('erp_product_id')->index()->nullable();
            $table->foreign('erp_product_id')->references('id')->on('erp_products')->onDelete('cascade');
            $table->string('entry_type')->nullable();
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
        Schema::dropIfExists('sale_purchase_taxes');
    }
}
