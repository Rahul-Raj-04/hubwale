<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErpSetupExpenseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_setup_expense_details', function (Blueprint $table) {
            $table->id();
            $table->enum('expense_detail_type', ['sales', 'purchase', 'credit-note', 'debit-note']);
            $table->string('expense_detail_id')->nullable()->default('CID'.rand(111111,999999));
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->bigInteger('account_id')->nullable()->unsigned()->index();
            $table->string('name');
            $table->enum('type', ['expense', 'Central Tax', 'State/UT Tax', 'Integrated Tax']);
            $table->string('serial_number')->nullable();
            $table->enum('calculation', ['fixed', 'itemwise', 'fixed-itemwise']);
            $table->boolean('readonly')->nullable()->default(false);
            $table->enum('ac_type', ['fixed', 'variable', 'sales_ac'])->default('fixed');
            $table->enum('ac_effect', ['yes', 'no', 'separate'])->default('yes');
            $table->enum('add_deduct', ['add', 'deduct'])->default('add');
            $table->enum('type_2', ['cumulative', 'fixed', 'percentage', 'surcharge', 'qty'])->default('cumulative');
            $table->string('type_2_percentage')->nullable()->default(0.00);
            $table->string('invoice_type')->nullable()->default('all');
            $table->boolean('round_off')->nullable()->default(false);
            $table->boolean('status')->nullable()->default(true); //enable-disable
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('erp_setting_expense_details');
    }
}
