<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->enum('vou_type', ['bank_payment', 'bank_receipt', 'cash_payment', 'cash_receipt', 'contra', 'creadit_note', 'debit_note', 'journal'])->nullable();
            $table->enum('tax_type', ['none'])->nullable();
            $table->date('vou_date')->nullable();
            $table->string('vou_no')->nullable(); 
            $table->string('chq_dd_no')->nullable();
            $table->date('chq_dd_date')->nullable();
            $table->enum('balance_type', ['CR', 'DB'])->nullable(); 

            $table->bigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            
            $table->string('chq_no')->nullable();
            $table->date('chq_date')->nullable();

            $table->bigInteger('currency_id')->unsigned()->index()->nullable();
            $table->foreign('currency_id')->references('id')->on('currency_masters')->onDelete('cascade');
            
            $table->string('exchange_rate')->nullable();
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->string('doc_no')->nullable();
            $table->date('doc_date')->nullable();
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
        Schema::dropIfExists('journal_entries');
    }
}
