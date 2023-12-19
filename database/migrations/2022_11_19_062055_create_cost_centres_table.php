<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_centres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('cost_category_id')->index()->nullable();
            $table->foreign('cost_category_id')->references('id')->on('cost_categories')->onDelete('cascade');
            $table->bigInteger('company_id')->nullable()->unsigned()->index();
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
        Schema::dropIfExists('cost_centres');
    }
}
