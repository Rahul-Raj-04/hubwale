<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriceColumnsInECommerceProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_commerce_product_variations', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->enum('packaging_type', ['box', 'piece', 'both'])->default('both')->after('name');
            $table->bigInteger('piece_per_box')->nullable()->after('packaging_type');
            $table->decimal('box_price', 10, 2)->nullable()->after('piece_per_box');
            $table->decimal('piece_price', 10, 2)->nullable()->after('box_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_commerce_product_variations', function (Blueprint $table) {
            //
        });
    }
}
