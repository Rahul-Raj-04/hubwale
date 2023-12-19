<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCNDNEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_n_d_n_entries', function (Blueprint $table) {
            $table->id();
            $table->enum('balance_type', ['cash', 'debit'])->nullable();
            $table->bigInteger('party_account_id')->unsigned()->index()->nullable();
            $table->foreign('party_account_id')->references('id')->on('accounts');
            $table->string('invoice_type')->nullable();
            $table->string('effect')->nullable();
            $table->string('tax_bill_of_supply')->nullable();
            $table->string('reason')->nullable();
            $table->date('vou_date')->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('doc_no')->nullable();
            $table->date('doc_date')->nullable();
            $table->string('original_bill_no')->nullable();
            $table->date('original_bill_date')->nullable();
            $table->unsignedBigInteger('sales_purchase_ac_id')->index()->nullable();
            $table->foreign('sales_purchase_ac_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('gst_commodity_id')->index()->nullable();
            $table->foreign('gst_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->string('assess_amt')->nullable();
            $table->string('narration')->nullable();
            $table->boolean('stock_effect')->nullable();
            $table->unsignedBigInteger('service_id')->index()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('qty')->nullable();
            $table->string('rate')->nullable();
            $table->string('amount')->nullable();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('currency_master_id')->index()->nullable();
            $table->foreign('currency_master_id')->references('id')->on('currency_masters')->onDelete('cascade');
            $table->string('model_name')->nullable();
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
        Schema::dropIfExists('c_n_d_n_entries');
    }
}
