<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvoiceTypeColumnSaleEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_entries', function (Blueprint $table) {
            $table->dropColumn('invoice_type');
            $table->unsignedBigInteger('invoice_type_id')->index()->nullable()->after('cash_debit');
            $table->foreign('invoice_type_id')->references('id')->on('erp_setup_invoice_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_entries', function (Blueprint $table) {
            //
        });
    }
}
