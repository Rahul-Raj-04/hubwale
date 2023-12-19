<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBooleanOrDefaultColumsForAccountsTableToAccountGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_groups', function (Blueprint $table) {

            $table->boolean('account_address_details')->default(0)->after('sequence');
            $table->boolean('account_bank_details')->default(0)->after('account_address_details');
            $table->boolean('account_interest')->default(0)->after('account_bank_details');
            $table->boolean('city_id')->default(0)->after('account_interest');
            $table->bigInteger('city_id_default')->nullable()->after('city_id');
            $table->boolean('pincode')->default(0)->after('city_id_default');
            $table->bigInteger('pincode_default')->nullable()->after('pincode');
            $table->boolean('area')->default(0)->after('pincode_default');
            $table->string('area_default')->nullable()->after('area');
            $table->boolean('mobile')->default(0)->after('area_default');
            $table->string('mobile_default')->nullable()->after('mobile');
            $table->boolean('state_id')->default(0)->after('mobile_default');
            $table->bigInteger('state_id_default')->nullable()->after('state_id');
            $table->boolean('pan_no')->default(0)->after('state_id_default');
            $table->bigInteger('pan_no_default')->nullable()->after('pan_no');
            $table->boolean('aadhar_no')->default(0)->after('pan_no_default');
            $table->bigInteger('aadhar_no_default')->nullable()->after('aadhar_no');
            $table->boolean('gstin_no')->default(0)->after('aadhar_no_default');
            $table->bigInteger('gstin_no_default')->nullable()->after('gstin_no');
            $table->boolean('balance_method')->default(0)->after('gstin_no_default');
            $table->string('balance_method_default')->nullable()->after('balance_method');
            $table->boolean('opening_balance')->default(0)->after('balance_method_default');
            $table->string('opening_balance_default')->nullable()->after('opening_balance');
            $table->boolean('balance_type')->default(0)->after('opening_balance_default');
            $table->string('balance_type_default')->nullable()->after('balance_type');
            $table->boolean('credit_limit')->default(0)->after('balance_type_default');
            $table->integer('credit_limit_default')->nullable()->after('credit_limit');
            $table->boolean('credit_days')->default(0)->after('credit_limit_default');
            $table->integer('credit_days_default')->nullable()->after('credit_days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_groups', function (Blueprint $table) {
            $table->dropColumn('city_id');
            $table->dropColumn('city_id_default');
            $table->dropColumn('pincode');
            $table->dropColumn('pincode_default');
            $table->dropColumn('area');
            $table->dropColumn('area_default');
            $table->dropColumn('mobile');
            $table->dropColumn('mobile_default');
            $table->dropColumn('state_id');
            $table->dropColumn('state_id_default');
            $table->dropColumn('pan_no');
            $table->dropColumn('pan_no_default');
            $table->dropColumn('aadhar_no');
            $table->dropColumn('aadhar_no_default');
            $table->dropColumn('gstin_no');
            $table->dropColumn('gstin_no_default');
            $table->dropColumn('balance_method');
            $table->dropColumn('balance_method_default');
            $table->dropColumn('opening_balance');
            $table->dropColumn('opening_balance_default');
            $table->dropColumn('balance_type');
            $table->dropColumn('balance_type_default');
            $table->dropColumn('credit_limit');
            $table->dropColumn('credit_limit_default');
            $table->dropColumn('credit_days');
            $table->dropColumn('credit_days_default');
            $table->dropColumn('account_address_details');
            $table->dropColumn('account_bank_details');
            $table->dropColumn('account_interest');
        });
    }
}
