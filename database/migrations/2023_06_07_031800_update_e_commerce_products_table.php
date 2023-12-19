<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateECommerceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_commerce_products', function (Blueprint $table) {
            $table->string('sub_category_id')->nullable()->after('category_id');
            $table->string('supplier_brand_id')->nullable()->after('brand_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_commerce_products', function (Blueprint $table) {
            $table->dropColumn(['sub_category_id', 'supplier_brand_id']);
        });
    }
}
