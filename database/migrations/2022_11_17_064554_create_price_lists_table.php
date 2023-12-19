<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('company_id')->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            
            $table->string('name');
            $table->timestamp('from')->nullable();
            $table->timestamp('to')->nullable();
            $table->string('sale_purchase')->nullable();
            $table->string('active_deactive')->nullable();
            $table->string('level')->nullable();
            $table->string('party_level')->nullable();
            $table->string('product_level')->nullable();
            $table->string('rate_type')->nullable();
            $table->string('ask_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('gst_sales_setup', function (Blueprint $table) {
            $table->string('module')->default('sale_setup')->nullable()->after('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_lists');

        Schema::table('gst_sales_setup', function (Blueprint $table) {
            $table->dropColumn('module');
        });
    }
}
