<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvisionalInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provisional_invoices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->unsignedBigInteger('account_id')->index()->nullable(); // (Bank/Cash)
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->unsignedBigInteger('particulars')->index()->nullable(); // (Bank/Cash)
            $table->foreign('particulars')->references('id')->on('services')->onDelete('cascade');

            $table->string('invoice_type')->nullable();            
            $table->string('bill_no')->nullable();            
            $table->timestamp('bill_date')->nullable();
            $table->decimal('amount', 18, 2)->default(0.00);
            $table->string('c_d')->nullable();            

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
        Schema::dropIfExists('provisional_invoices');
    }
}
