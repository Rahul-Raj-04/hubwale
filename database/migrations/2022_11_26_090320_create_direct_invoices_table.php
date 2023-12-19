<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_invoices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('account_id')->index()->nullable(); 
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->unsignedBigInteger('sale_account_id')->index()->nullable(); 
            $table->foreign('sale_account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->unsignedBigInteger('service_id')->index()->nullable(); 
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->decimal('amount', 18, 2)->default(0.00);
            $table->string('c_d')->nullable();            
            $table->string('invoice_type')->nullable();            
            $table->string('tax_retail')->nullable();            
            $table->string('bill_no')->nullable();            
            $table->timestamp('bill_date')->nullable();
            $table->string('doc_no')->nullable();            
            $table->timestamp('doc_date')->nullable();
            $table->string('narration')->nullable();            
            $table->string('currency')->nullable();            
            $table->string('forex_bill_amount')->nullable();            

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direct_invoices');
    }
}
