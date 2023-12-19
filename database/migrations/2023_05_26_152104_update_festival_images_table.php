<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFestivalImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('festival_images', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable()->default(1);
            $table->unsignedBigInteger('business_category_id')->nullable();
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
            $table->dropColumn(['country_id', 'business_category_id']);
        });
    }
}
