<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountBillToBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_bill_to_bills', function (Blueprint $table) {
            $table->id();
            $table->string('adjustment_type')->nullable();
            $table->date('date')->nullable();
            $table->string('particular')->nullable();
            $table->string('credit_days')->nullable();
            $table->string('amount')->nullable();
            $table->string('adjusted_amt')->nullable();
            $table->string('balance_type')->nullable();
            $table->unsignedBigInteger('account_id')->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('account_bill_to_bills');
    }
}
