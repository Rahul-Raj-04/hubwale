<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update2ECommercePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_commerce_permissions', function (Blueprint $table) {
            $table->dropColumn('product_id');
            $table->bigInteger('company_id')->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_commerce_permissions', function (Blueprint $table) {
            $table->bigInteger('product_id')->after('user_id');
            $table->dropColumn('comany_id');
        });
    }
}
