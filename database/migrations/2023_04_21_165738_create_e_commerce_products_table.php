<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateECommerceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_commerce_products', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('category_id');
            $table->string('brand_id');
            $table->string('product_number')->nullable();
            $table->string('name');
            $table->text('description', 65535)->nullable();
            $table->string('packaging_type')->default('piece');
            $table->string('piece_per_package')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('e_commerce_products');
    }
}
