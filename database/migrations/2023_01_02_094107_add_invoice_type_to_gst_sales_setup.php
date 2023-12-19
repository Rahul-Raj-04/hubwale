<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceTypeToGstSalesSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gst_sales_setup', function (Blueprint $table) {
            $table->string('invoice_type')->nullable()->after('sales_purchase_ac_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gst_sales_setup', function (Blueprint $table) {
            //
        });
    }
}
