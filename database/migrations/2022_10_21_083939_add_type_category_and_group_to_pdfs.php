<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeCategoryAndGroupToPdfs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pdfs', function (Blueprint $table) {
            $table->string('type')->nullable()->after('user_id');
            $table->bigInteger('group_id')->nullable()->unsigned()->index()->after('products');
            $table->bigInteger('category_id')->nullable()->unsigned()->index()->after('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdfs', function (Blueprint $table) {
            //
        });
    }
}
