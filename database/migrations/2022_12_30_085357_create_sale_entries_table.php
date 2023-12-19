<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedBigInteger('party_ac_id')->index()->nullable();
            $table->foreign('party_ac_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('sale_ac_id')->index()->nullable();
            $table->foreign('sale_ac_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('service_id')->index()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('group_id')->nullable();
            $table->string('type')->nullable();
            $table->string('cash_debit')->nullable();
            $table->string('invoice_type')->nullable();
            $table->string('bill_no')->nullable();
            $table->string('bill_date')->nullable();
            $table->string('doc_no')->nullable();
            $table->string('doc_date')->nullable();
            $table->string('original_bill_no')->nullable();
            $table->string('original_bill_date')->nullable();
            $table->string('qty')->nullable();
            $table->string('rate')->nullable();
            $table->string('amount')->nullable();
            $table->string('tax_bill_of_supply')->nullable();
            $table->string('narration')->nullable();
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
        Schema::dropIfExists('sale_entries');
    }
}
