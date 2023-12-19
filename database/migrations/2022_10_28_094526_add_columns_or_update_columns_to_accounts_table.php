<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsOrUpdateColumnsToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {

            // Existing columns added nullable 
            $table->string('name')->nullable()->change();
            $table->string('alias')->nullable()->change();
            $table->bigInteger('account_group_id')->unsigned()->nullable()->change();
            $table->bigInteger('city_id')->unsigned()->nullable()->change();
            $table->integer('pincode')->nullable()->change();
            $table->string('area')->nullable()->change();
            $table->string('mobile')->nullable()->change();
            $table->bigInteger('state_id')->unsigned()->nullable()->change();
            $table->integer('pan_no')->nullable()->change();
            $table->integer('aadhar_no')->nullable()->change();
            $table->integer('gstin_no')->nullable()->change();
            $table->string('balance_method')->nullable()->change();
            $table->unsignedDecimal('opening_balance')->nullable()->change();
            $table->string('balance_type')->nullable()->change();
            $table->unsignedDecimal('credit_limit')->nullable()->change();
            $table->integer('credit_days')->nullable()->change();

            // New column
            $table->string('gst_type')->nullable()->after('account_group_id');
            $table->unsignedDecimal('interest')->nullable()->after('credit_days');
            $table->string('interest_ac')->nullable()->after('interest');
            $table->string('tds_ac')->nullable()->after('interest_ac');
            $table->string('cr_dr')->nullable()->after('tds_ac');
            $table->string('bank_name')->nullable()->after('cr_dr');
            $table->string('branch_name')->nullable()->after('bank_name');
            $table->string('address')->nullable()->after('branch_name');
            $table->string('ifsc_code')->nullable()->after('address');
            $table->string('account_no')->nullable()->after('ifsc_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('gst_type');
            $table->dropColumn('interest');
            $table->dropColumn('interest_ac');
            $table->dropColumn('tds_ac');
            $table->dropColumn('cr_dr');
            $table->dropColumn('bank_name');
            $table->dropColumn('branch_name');
            $table->dropColumn('address');
            $table->dropColumn('ifsc_code');
            $table->dropColumn('account_no');
        });
    }
}
