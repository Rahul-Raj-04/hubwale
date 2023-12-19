<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockManagementTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_management_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable()->unsigned()->index();
            $table->bigInteger('defective_packages_quantity')->nullable();
            $table->bigInteger('defective_pieces_quantity')->nullable();
            $table->bigInteger('available_packages_quantity')->nullable();
            $table->bigInteger('available_pieces_quantity')->nullable();
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
        Schema::dropIfExists('stock_management_transactions');
    }
}
