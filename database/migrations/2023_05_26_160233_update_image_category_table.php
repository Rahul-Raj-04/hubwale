<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImageCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('image_category', 'deleted_at')) {
            Schema::dropColumns('image_category', ['deleted_at']);
        }
        Schema::table('image_category', function (Blueprint $table) {
            $table->softDeletes()->after('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_category', function (Blueprint $table) {
            if (Schema::hasColumn('image_category', 'deleted_at')) {
                Schema::dropColumns('image_category', ['deleted_at']);
            }
        });
    }
}
