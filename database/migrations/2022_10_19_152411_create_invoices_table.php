<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('plan_id')->nullable()->unsigned()->index();
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->float('amount', 10, 2);
            $table->float('tax', 10, 2)->default(0);
            $table->float('total_amount', 10, 2);
            $table->text('info')->nullable();
            $table->text('reference_id')->nullable();
            $table->string('payment_method')->default('PAYTM');
            $table->string('currency')->default('INR');
            $table->string('status')->default('success');
            $table->json('extra_details')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
