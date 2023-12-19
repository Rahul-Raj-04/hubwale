<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErpProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->boolean('garment_product')->nullable();
            $table->unsignedBigInteger('gst_commodity_id')->index()->nullable();
            $table->foreign('gst_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->unsignedBigInteger('vat_commodity_id')->index()->nullable();
            $table->foreign('vat_commodity_id')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->unsignedBigInteger('commodity_for_less')->index()->nullable();
            $table->foreign('commodity_for_less')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->unsignedBigInteger('commodity_for_greater')->index()->nullable();
            $table->foreign('commodity_for_greater')->references('id')->on('gst_commodity')->onDelete('cascade');
            $table->bigInteger('group_id')->nullable()->unsigned()->index();
            $table->bigInteger('category_id')->nullable()->unsigned()->index();

            $table->boolean('stock_required')->nullable();
            $table->boolean('pricelist')->nullable();
            $table->boolean('tcs')->nullable();

            $table->string('purchase_rate')->nullable();
            $table->string('sales_rate')->nullable();
            $table->string('tax_paid_rate')->nullable();
            
            $table->unsignedBigInteger('sales_unit_id')->index()->nullable();
            $table->foreign('sales_unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->unsignedBigInteger('purchase_unit_id')->index()->nullable();
            $table->foreign('purchase_unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->string('gst_unit')->nullable();
            
            $table->string('quantity')->nullable();
            $table->string('amount')->nullable();

            $table->string('minimum_stock')->nullable();
            $table->string('reorder_level')->nullable();
            $table->boolean('auto_production')->nullable();
            $table->string('process_name')->nullable();
            $table->string('sales_conversion_factor')->nullable();
            $table->string('parchase_conversion_factor')->nullable();
            $table->string('stock_conversion_factor')->nullable();

            $table->unsignedBigInteger('closing_stock_account')->index()->nullable();
            $table->foreign('closing_stock_account')->references('id')->on('account_groups')->onDelete('cascade');
            
            $table->unsignedBigInteger('trending_account')->index()->nullable();
            $table->foreign('trending_account')->references('id')->on('accounts')->onDelete('cascade');

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
        Schema::dropIfExists('erp_products');
    }
}
