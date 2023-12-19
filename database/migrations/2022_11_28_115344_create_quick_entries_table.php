<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('main_account_id')->unsigned()->index()->nullable();
            $table->foreign('main_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->enum('type', ['receipt', 'payment', 'journal', 'credit_note', 'debit_note'])->nullable();
            $table->string('vou_type')->nullable();
            $table->date('date')->nullable();
            $table->string('day')->nullable();
            $table->string('vou_no')->nullable();
            $table->string('doc_no')->nullable();
            $table->bigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->bigInteger('currency_id')->unsigned()->index()->nullable();
            $table->foreign('currency_id')->references('id')->on('currency_masters')->onDelete('cascade');
            $table->string('exchange_rate')->nullable();
            $table->string('amount')->nullable();
            $table->string('narration')->nullable();
            $table->enum('balance_type', ['credit', 'debit'])->nullable();
            $table->string('module_name')->nullable();
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
        Schema::dropIfExists('quick_entries');
    }
}
