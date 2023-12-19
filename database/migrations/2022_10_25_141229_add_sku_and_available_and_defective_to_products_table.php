<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkuAndAvailableAndDefectiveToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->float('price_per_piece', 10, 2)->nullable()->change();
            $table->float('price_per_package', 10, 2)->nullable()->change();
            $table->bigInteger('defective_packages_quantity')->nullable()->after('quantity_per_package');
            $table->bigInteger('defective_pieces_quantity')->nullable()->after('quantity_per_package');
            $table->bigInteger('available_packages_quantity')->nullable()->after('quantity_per_package');
            $table->bigInteger('available_pieces_quantity')->nullable()->after('quantity_per_package');
            $table->string('sku')->nullable()->after('quantity_per_package');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
