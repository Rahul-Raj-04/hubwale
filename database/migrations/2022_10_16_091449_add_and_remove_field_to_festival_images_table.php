<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndRemoveFieldToFestivalImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('festival_images', function (Blueprint $table) {
            $table->dropColumn(['name', 'date']);
            $table->string('design_name')->nullable();
            $table->unsignedBigInteger('image_category_id')->nullable();
            $table->foreign('image_category_id')->references('id')->on('image_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('festival_images', function (Blueprint $table) {
            //
        });
    }
}
