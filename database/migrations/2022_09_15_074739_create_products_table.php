<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
            $table->bigInteger('group_id')->nullable()->unsigned()->index();
            $table->bigInteger('category_id')->nullable()->unsigned()->index();
            $table->string('name');
            $table->string('alias')->nullable();
            $table->string('gst_commodity')->nullable();
            $table->string('number')->nullable();
            $table->string('size')->nullable(); // in cm or inch or meter
            $table->json('custom_size')->nullable();
            $table->string('brand')->nullable();
            $table->string('description')->nullable();
            $table->string('packaging_type')->nullable();
            $table->string('price_per_piece')->nullable();
            $table->string('price_per_package')->nullable();
            $table->string('weight_per_piece')->nullable();
            $table->string('weight_per_package')->nullable();
            $table->string('quantity_per_package')->nullable();
            $table->string('color')->nullable();
            $table->json('custom_color')->nullable();
            $table->string('grade')->nullable();
            $table->string('unit')->nullable();
            $table->string('surface')->nullable();
            $table->json('custom_fields')->nullable();
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
        Schema::dropIfExists('products');
    }
}
