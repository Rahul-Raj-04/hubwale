<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias');
            $table->bigInteger('account_group_id')->unsigned()->index();
            $table->foreign('account_group_id')->references('id')->on('account_groups');
            $table->bigInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('pincode');
            $table->string('area');
            $table->string('mobile');
            $table->bigInteger('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states');
            $table->integer('pan_no');
            $table->integer('aadhar_no');
            $table->integer('gstin_no');
            $table->string('balance_method');
            $table->string('opening_balance');
            $table->string('balance_type');
            $table->integer('credit_limit');
            $table->integer('credit_days');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
