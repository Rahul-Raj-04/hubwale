<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashBankReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_bank_receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->date('date')->nullable();
            $table->string('vou_no')->nullable();
            $table->bigInteger('opposite_account_id')->unsigned()->index()->nullable();
            $table->foreign('opposite_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('amount')->nullable();
            $table->string('chq_dd_no')->nullable();
            $table->date('chq_dd_date')->nullable();
            $table->string('doc_no')->nullable();
            $table->date('doc_date')->nullable();
            $table->string('narration')->nullable();
            $table->string('receipt_type')->nullable();
            $table->unsignedBigInteger('currency_id')->index()->nullable();
            $table->foreign('currency_id')->references('id')->on('currency_masters')->onDelete('cascade');
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
        Schema::dropIfExists('cash_bank_receipts');
    }
}
