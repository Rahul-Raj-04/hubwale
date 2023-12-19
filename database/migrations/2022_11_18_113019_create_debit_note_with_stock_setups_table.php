<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitNoteWithStockSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_note_with_stock_setups', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['gst_commodity','default']);
            $table->unsignedBigInteger('gst_commodity_id')->index()->nullable();
            $table->foreign('gst_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->unsignedBigInteger('sales_purchase_ac_id')->index()->nullable();
            $table->foreign('sales_purchase_ac_id')->references('id')->on('accounts')->onDelete('cascade');
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
        Schema::dropIfExists('debit_note_with_stock_setups');
    }
}
