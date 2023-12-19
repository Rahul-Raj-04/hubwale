<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPendQtyAndClosingQtyDiffrenceQtyToJobworkInOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobwork_outs', function (Blueprint $table) {
            $table->decimal('pend_qty', 18, 2)->default(0.00)->after('qty');
            $table->decimal('closing_qty', 18, 2)->default(0.00)->after('pend_qty');
            $table->decimal('difference_qty', 18, 2)->default(0.00)->after('closing_qty');
        });

        Schema::table('jobwork_ins', function (Blueprint $table) {
            $table->decimal('pend_qty', 18, 2)->default(0.00)->after('qty');
            $table->decimal('closing_qty', 18, 2)->default(0.00)->after('pend_qty');
            $table->decimal('difference_qty', 18, 2)->default(0.00)->after('closing_qty'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobwork_outs', function (Blueprint $table) {
            $table->dropColumn('pend_qty');
            $table->dropColumn('closing_qty');
            $table->dropColumn('difference_qty');
        });

        Schema::table('jobwork_ins', function (Blueprint $table) {
            $table->dropColumn('pend_qty');
            $table->dropColumn('closing_qty');
            $table->dropColumn('difference_qty'); 
        });
    }
}
