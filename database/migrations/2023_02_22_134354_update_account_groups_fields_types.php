<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountGroupsFieldsTypes extends Migration
{
    /**
     * up
     *
     * @return void
     * @author BV
     */
    public function up()
    {
        Schema::table('account_groups', function (Blueprint $table) {
            $table->string('pan_no_default')->change();
            $table->string('gstin_no_default')->change();
        });
    }

    /**
     * down
     *
     * @return void
     * @author BV
     */
    public function down()
    {
        Schema::table('account_groups', function (Blueprint $table) {
            $table->integer('pan_no_default')->change();
            $table->integer('gstin_no_default')->change();
        });
    }
}
