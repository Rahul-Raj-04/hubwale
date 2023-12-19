<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInvoiceTypeToJWInSetups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('j_w_in_setups', function (Blueprint $table) {
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
        Schema::table('j_w_in_setups', function (Blueprint $table) {
            //
        });
    }
}
