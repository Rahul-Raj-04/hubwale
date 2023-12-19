<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyCloumnToGstCommodityOrSlabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_groups', function (Blueprint $table) {
            $table->dropColumn('is_common');
            $table->dropForeign('account_groups_parent_id_foreign');
            $table->dropColumn('parent_id');
            $table->dropForeign('account_groups_company_id_foreign');
            $table->dropColumn('company_id');
        });
        
        Schema::table('gst_commodity', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->index()->nullable()->after('id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('gst_slab', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->index()->nullable()->after('id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });


        Schema::table('account_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->index()->nullable()->after('id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_account_group_id_foreign');
            $table->dropColumn('account_group_id');
            $table->unsignedBigInteger('company_id')->index()->nullable()->after('id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('account_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->index()->nullable()->after('id');
            $table->foreign('parent_id')->references('id')->on('account_groups')->onDelete('cascade');
            $table->unsignedBigInteger('company_id')->index()->nullable()->after('parent_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('account_group_id')->index()->nullable()->after('company_id');
            $table->foreign('account_group_id')->references('id')->on('account_groups')->onDelete('cascade');
        });

        Schema::table('gst_sales_setup', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->index()->nullable()->after('id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gst_commodity', function (Blueprint $table) {
            $table->dropForeign('gst_commodity_company_id_foreign');
            $table->dropColumn('company_id');
        });

        Schema::table('gst_slab', function (Blueprint $table) {
            $table->dropForeign('gst_slab_company_id_foreign');
            $table->dropColumn('company_id');
        });

        Schema::table('account_groups', function (Blueprint $table) {
            $table->boolean('is_common')->nullable()->after('company_id');
        });

        Schema::table('account_transactions', function (Blueprint $table) {
            $table->dropForeign('account_transactions_company_id_foreign');
            $table->dropColumn('company_id');
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_company_id_foreign');
            $table->dropColumn('company_id');
        });

        Schema::table('gst_sales_setup', function (Blueprint $table) {
            $table->dropForeign('gst_sales_setup_company_id_foreign');
            $table->dropColumn('company_id');
        });
    }
}
