<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsCommonAndCompanyIdToAccountGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_groups', function (Blueprint $table) {

            $table->unsignedBigInteger('company_id')->index()->nullable()->after('parent_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->boolean('is_common')->default(1)->after('company_id');
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
            $table->dropForeign('account_groups_company_id_foreign');
            $table->dropColumn('company_id');
            $table->dropColumn('is_common');
        });
    }
}
