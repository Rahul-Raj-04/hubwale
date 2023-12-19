<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id')->index()->nullable(); // (Bank/Cash)
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->enum('type', ['Rcpt','Pymt']); // (Receipt/Payment)
            $table->timestamp('date');
            $table->string('voucher_no')->nullable();            
            $table->unsignedBigInteger('opposite_account_id')->index()->nullable();
            $table->foreign('opposite_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->decimal('amount', 18, 2)->default(0.00);
            $table->enum('payment_method', ['upi','cheque', 'bank_transfer'])->nullable();
            $table->string('reference_no')->nullable();
            $table->timestamp('transaction_date')->nullable();            
            $table->string('doc_no')->nullable();
            $table->timestamp('doc_date')->nullable();            
            $table->text('narration')->nullable();            
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
        Schema::dropIfExists('account_transactions');
    }
}
