<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstCommodityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_commodity', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('gst_slab_id')->index()->nullable();
            $table->foreign('gst_slab_id')->references('id')->on('gst_slab')->onDelete('cascade');

            $table->unsignedBigInteger('hsn_sac_id')->index()->nullable();
            $table->foreign('hsn_sac_id')->references('id')->on('hsn_sac')->onDelete('cascade');

            $table->text('description')->nullable();
            $table->enum('commodity_type', ['goods','services']);
            $table->dateTime('applied_at');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gst_commodity');
    }
}
