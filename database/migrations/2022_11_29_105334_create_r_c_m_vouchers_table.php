<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRCMVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_c_m_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('vou_no')->nullable();
            $table->string('gst_type')->nullable();
            $table->unsignedBigInteger('gst_commodity_id')->index()->nullable();
            $table->foreign('gst_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->boolean('i_t_c')->nullable();
            $table->bigInteger('opposite_account_id')->unsigned()->index()->nullable();
            $table->foreign('opposite_account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->string('amount')->nullable();
            $table->string('chq_dd_no')->nullable();
            $table->date('chq_dd_date')->nullable();
            $table->string('doc_no')->nullable();
            $table->date('doc_date')->nullable();
            $table->string('narration')->nullable();
            $table->string('vou_type')->nullable();
            
            $table->bigInteger('currency_id')->unsigned()->index()->nullable();
            $table->foreign('currency_id')->references('id')->on('currency_masters')->onDelete('cascade');
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
        Schema::dropIfExists('r_c_m_vouchers');
    }
}
