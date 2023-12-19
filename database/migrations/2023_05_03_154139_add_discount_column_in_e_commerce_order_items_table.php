<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountColumnInECommerceOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_commerce_order_items', function (Blueprint $table) {
            $table->string('discount')->after('price')->nullable();
            $table->string('tax')->after('discount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_commerce_order_items', function (Blueprint $table) {
            $table->dropColumn('discount');
        });
    }
}
