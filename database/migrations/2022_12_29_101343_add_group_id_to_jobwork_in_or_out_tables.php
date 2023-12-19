<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupIdToJobworkInOrOutTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobwork_ins', function (Blueprint $table) {
            $table->string('group_id')->after('id')->nullable();
        });
        
        Schema::table('jobwork_outs', function (Blueprint $table) {
            $table->string('group_id')->after('id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobwork_ins', function (Blueprint $table) {
            $table->dropColumn('group_id');
        });

        Schema::table('jobwork_outs', function (Blueprint $table) {
            $table->dropColumn('group_id');
        });
    }
}
