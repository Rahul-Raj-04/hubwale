<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_incomes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('party_account_id')->unsigned()->index()->nullable();
            $table->foreign('party_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->date('bill_date')->nullable();
            $table->string('bill_no')->nullable();
            $table->date('doc_no')->nullable();
            $table->string('doc_date')->nullable();
            $table->bigInteger('income_account_id')->unsigned()->index()->nullable();
            $table->foreign('income_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('gst_commodity_id')->index()->nullable();
            $table->foreign('gst_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->bigInteger('assess_amt')->nullable();
            $table->string('central_tax')->nullable();
            $table->string('state_tax')->nullable();
            $table->string('integrated_tax')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('narration')->nullable();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('gst_incomes');
    }
}
