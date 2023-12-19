<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_journal_entries', function (Blueprint $table) {
            $table->id();
            $table->string('vou_type')->nullable();
            $table->string('type')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('reference_no')->nullable();
            $table->date('vou_date')->nullable();
            $table->string('vou_no')->nullable();
            $table->string('doc_no')->nullable();
            $table->date('doc_date')->nullable();
            $table->string('balance_type')->nullable();
            $table->bigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('gst_commodity_id')->index()->nullable();
            $table->foreign('gst_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->string('assess_amt')->nullable();
            $table->unsignedBigInteger('currency_id')->index()->nullable();
            $table->foreign('currency_id')->references('id')->on('currency_masters')->onDelete('cascade');
            $table->string('entry_type')->nullable();
            $table->string('exchange_rate')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
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
        Schema::dropIfExists('gst_journal_entries');
    }
}
