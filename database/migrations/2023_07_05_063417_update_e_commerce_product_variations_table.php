<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateECommerceProductVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_commerce_product_variations', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('size_id')->after('product_id');
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
            $table->string('name');
            $table->dropColumn('size_id');
        });
    }
}
