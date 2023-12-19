<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobworkOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobwork_outs', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('account_id')->index()->nullable(); // (Bank/Cash)
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->unsignedBigInteger('jobwork_ac_id')->index()->nullable(); // (Bank/Cash)
            $table->foreign('jobwork_ac_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->unsignedBigInteger('product_name')->index()->nullable(); // (Bank/Cash)
            $table->foreign('product_name')->references('id')->on('services')->onDelete('cascade');
            
            $table->string('module')->nullable();
            $table->string('type')->nullable();
            $table->string('r_i')->nullable();

            $table->decimal('qty', 18, 2)->default(0.00);
            $table->decimal('rate', 18, 2)->default(0.00);
            $table->decimal('amount', 18, 2)->default(0.00);
            $table->decimal('jobwork_rate', 18, 2)->default(0.00);
            $table->decimal('jobwork_amount', 18, 2)->default(0.00);
            
            $table->string('order_no')->nullable();
            $table->timestamp('order_date')->nullable();
            
            $table->string('bill_no')->nullable();            
            $table->timestamp('bill_date')->nullable();

            $table->string('doc_no')->nullable();
            $table->timestamp('doc_date')->nullable();            

            $table->string('voucher_no')->nullable();            
            $table->timestamp('voucher_date')->nullable();            

            $table->string('challan_no')->nullable();
            $table->timestamp('challan_date')->nullable();            

            $table->string('batch_name')->nullable();            
            $table->string('invoice_type')->nullable();            
            $table->string('tax_bill_supply')->nullable();            
            $table->string('nature_proccessing')->nullable();            
            $table->text('narration')->nullable();            

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
        Schema::dropIfExists('jobwork_outs');
    }
}
