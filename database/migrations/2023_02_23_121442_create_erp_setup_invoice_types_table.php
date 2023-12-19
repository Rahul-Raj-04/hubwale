<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErpSetupInvoiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_setup_invoice_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->enum('invoice_type', ['sales', 'purchase', 'credit-note', 'debit-note']);
            $table->string('invoice_type_id')->nullable()->default('CID'.rand(111111,999999));
            $table->string('name');
            $table->string('type'); // Types are comes from App/Enum/Enum::MASTER_GST_INVOICE_TYPE
            $table->enum('gst_type', ['Item wise', 'Voucher wise'])->nullable()->default('Item wise');
            $table->enum('export_type', ['UT-1', 'Bond', 'CT-1', 'CT-2', 'CT-3', 'Exp-0%'])->nullable()->default('UT-1');
            $table->boolean('is_capital_goods')->nullable()->default(false);
            $table->boolean('is_party_allowed')->nullable()->default(false);
            $table->boolean('is_place_of_supply')->nullable()->default(false);
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
        Schema::dropIfExists('erp_setup_invoice_types');
    }
}
