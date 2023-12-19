<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForexAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forex_adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('vou_type')->nullable();
            $table->date('vou_date')->nullable();
            $table->string('vou_no')->nullable();
            $table->string('doc_no')->nullable();
            $table->date('doc_date')->nullable();
            $table->string('balance_type')->nullable();
            $table->unsignedBigInteger('account_id')->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('debit')->nullable();
            $table->string('credit')->nullable();
            $table->string('narration')->nullable();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->boolean('is_audit')->default(0);
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
        Schema::dropIfExists('forex_adjustments');
    }
}
