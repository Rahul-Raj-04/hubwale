<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            //Company details
            $table->string('company_number')->nullable();
            $table->string('language')->nullable();
            $table->string('company_name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('group_name')->nullable();
            $table->string('fin_year_from')->nullable();
            $table->string('fin_year_to')->nullable();
            $table->string('password')->nullable();
            $table->text('report_header')->nullable();
            $table->string('jurisdiction_city')->nullable();
            $table->string('auto_gst')->nullable();

            //Statutory details
            $table->string('pan')->nullable();
            $table->string('gstin')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('tin')->nullable();
            $table->string('cst')->nullable();
            $table->string('tan')->nullable();
            $table->string('ecc')->nullable();
            $table->string('importer_ecc_no')->nullable();
            $table->string('service_tax_no')->nullable();
            $table->string('ssi_no')->nullable();
            $table->string('generel_lic_no')->nullable();
            $table->string('wholesale_agent_lic_no')->nullable();
            $table->string('commission_lic_no')->nullable();
            $table->string('drug_lic_no')->nullable();
            $table->string('cin_no')->nullable();
            $table->string('food_product_lic_no')->nullable();

            //Address details
            $table->text('address')->nullable();
            $table->text('country')->nullable();
            $table->text('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('mob_1')->nullable();
            $table->string('mob_2')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            //Bank details
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->string('bank_ac_no')->nullable();
            $table->string('iban_no')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('upi_code')->nullable();
            $table->string('upi_id')->nullable();

            //casts
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
