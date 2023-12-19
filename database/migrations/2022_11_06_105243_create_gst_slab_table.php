<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstSlabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_slab', function (Blueprint $table) {
            $table->id();
            $table->string('gst_slab')->nullable();
            $table->enum('gst_type', ['gst', 'nil_rated', 'non_gst', 'Other']);
            $table->decimal('state_ut_tax', 18, 2)->default(0.00);
            $table->decimal('central_tax', 18, 2)->default(0.00);
            $table->decimal('integrated_tax', 18, 2)->default(0.00);
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
        Schema::dropIfExists('gst_slab');
    }
}
