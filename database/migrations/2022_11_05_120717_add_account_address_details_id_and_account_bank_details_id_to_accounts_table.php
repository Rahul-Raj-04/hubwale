<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountAddressDetailsIdAndAccountBankDetailsIdToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {

            $table->unsignedBigInteger('account_address_detail_id')->index()->nullable()->after('id');

            $table->foreign('account_address_detail_id')->references('id')->on('account_address_details')->onDelete('cascade');

            $table->unsignedBigInteger('account_bank_detail_id')->index()->nullable()->after('account_address_detail_id');

            $table->foreign('account_bank_detail_id')->references('id')->on('account_bank_details')->onDelete('cascade');

            $table->unsignedBigInteger('account_interest_id')->index()->nullable()->after('account_bank_detail_id');

            $table->foreign('account_interest_id')->references('id')->on('account_interests')->onDelete('cascade');
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

            $table->dropForeign('accounts_account_address_detail_id_foreign');
            $table->dropColumn('account_address_detail_id');
            
            $table->dropForeign('accounts_account_bank_detail_id_foreign');
            $table->dropColumn('account_bank_detail_id');

            $table->dropForeign('accounts_account_interest_id_foreign');
            $table->dropColumn('account_interest_id');
        });
    }
}
