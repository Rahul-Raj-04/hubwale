<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizationEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilization_entries', function (Blueprint $table) {
            $table->id();
            $table->string('vou_type')->nullable();
            $table->string('period_of_utilization')->nullable();
            $table->date('vou_date')->nullable();
            $table->string('vou_no')->nullable();
            $table->string('doc_no')->nullable();
            $table->string('doc_date')->nullable();
            $table->string('utilization_from')->nullable();
            $table->bigInteger('from_account_id')->unsigned()->index()->nullable();
            $table->foreign('from_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('utilization_for')->nullable();
            $table->bigInteger('for_account_id')->unsigned()->index()->nullable();
            $table->foreign('for_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('amount')->nullable();
            $table->string('narration')->nullable();
            $table->string('utilization_type')->nullable();
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('utilization_entries');
    }
}
