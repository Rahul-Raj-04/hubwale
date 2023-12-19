<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateECommerceBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_commerce_brands', function (Blueprint $table) {
            $table->enum('type', ['own', 'supplier'])->default('own')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_commerce_brands', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
