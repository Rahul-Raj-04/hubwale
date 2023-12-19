<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToLedgerAccountBalances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ledger_account_balances', function (Blueprint $table) {
            $table->string('balance_type')->nullable()->after('type');
            $table->decimal('closing_balance', 20, 2)->nullable()->after('balance_type');
            $table->bigInteger('type_id')->nullable()->unsigned()->index()->after('closing_balance');
            $table->date('date')->nullable()->after('type_id');
            $table->string('vou_doc_no')->nullable()->after('date');
            $table->unsignedBigInteger('opposite_account_id')->nullable();
            $table->foreign('opposite_account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ledger_account_balances', function (Blueprint $table) {
            //
        });
    }
}
