<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('party_ac_id')->index()->nullable();
            $table->foreign('party_ac_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('purc_ac_id')->index()->nullable();
            $table->foreign('purc_ac_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('service_id')->index()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('group_id')->nullable();
            $table->string('type')->nullable();
            $table->string('cash_debit')->nullable();
            $table->string('invoice_type')->nullable();
            $table->string('vou_no')->nullable();
            $table->date('vou_date')->nullable();
            $table->string('bill_no')->nullable();
            $table->date('bill_date')->nullable();
            $table->string('cheque_no')->nullable();
            $table->date('cheque_date')->nullable();
            $table->string('original_bill_no')->nullable();
            $table->date('original_bill_date')->nullable();
            $table->date('date')->nullable();
            $table->string('doc_no')->nullable();
            $table->date('doc_date')->nullable();
            $table->string('party_name')->nullable();
            $table->string('balance')->nullable();
            $table->string('pending')->nullable();
            $table->string('qty')->nullable();
            $table->string('rate')->nullable();
            $table->string('amount')->nullable();
            $table->string('narration')->nullable();
            $table->string('tax_bill_of_supply')->nullable();
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
        Schema::dropIfExists('purchase_entries');
    }
}
