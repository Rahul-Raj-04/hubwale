<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDefaultAndCategoryToAccountGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_groups', function (Blueprint $table) {
            $table->boolean('is_default')->nullable()->after('sequence');
            $table->string('category')->nullable()->after('is_default');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_groups', function (Blueprint $table) {
            $table->dropColumn('is_default');
            $table->dropColumn('category');
        });
    }
}
