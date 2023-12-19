<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerAccountBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_account_balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id')->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');   
            $table->bigInteger('balance')->default(0);
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledger_account_balances');
    }
}
