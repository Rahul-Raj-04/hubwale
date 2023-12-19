<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('utilization_type')->nullable();
            $table->string('vou_no')->nullable();
            $table->string('period')->nullable();
            $table->date('chq_dd_date')->nullable();
            $table->string('chq_dd_no')->nullable();
            $table->date('challan_date')->nullable();
            $table->string('challan_no')->nullable();
            $table->json('tax')->nullable();
            $table->json('interest')->nullable();
            $table->json('penalty')->nullable();
            $table->json('fees')->nullable();
            $table->json('other')->nullable();
            $table->json('total')->nullable();
            $table->string('amount')->nullable();
            $table->string('narration')->nullable();
            $table->string('gst_entry_type')->nullable();
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
        Schema::dropIfExists('gst_entries');
    }
}
