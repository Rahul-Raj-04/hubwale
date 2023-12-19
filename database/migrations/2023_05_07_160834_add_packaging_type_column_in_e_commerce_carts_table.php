<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPackagingTypeColumnInECommerceCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_commerce_carts', function (Blueprint $table) {
            $table->string('packaging_type')->after('product_variation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_commerce_carts', function (Blueprint $table) {
            $table->dropColumn('packaging_type');
        });
    }
}
