<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnsInPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn(['type', 'fi_download_limit']);
            $table->bigInteger('fi_download_limit_monthly')->nullable()->after('fi_ad');
            $table->bigInteger('fi_download_limit_yearly')->nullable()->after('fi_download_limit_monthly');
            $table->boolean('status')->default(true)->after('country_id');
            $table->boolean('erp')->default(false)->after('fi_download_limit_yearly');
            $table->boolean('pdf_maker')->default(false)->after('erp');
            $table->boolean('stock_management')->default(false)->after('pdf_maker');
            $table->boolean('e_commerce')->default(false)->after('stock_management');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->string('type')->nullable();
            $table->integer('fi_download_limit')->nullable();
            $table->dropColumn(['erp', 'pdf_maker', 'stock_management', 'e_commerce', 'status', 'fi_download_limit_monthly', 'fi_download_limit_yearly']);
        });
    }
}
