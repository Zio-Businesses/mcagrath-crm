<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vendor_contracts', function (Blueprint $table) {
            
            $table->text('company_name')->nullable();
            $table->text('street_address')->nullable();
             $table->text('city')->nullable();
            $table->text('state')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('office')->nullable();
            $table->text('cell')->nullable();
            $table->text('website')->nullable();
            $table->text('company_logo')->nullable();
            $table->enum('licensed', ['yes', 'no', 'not_applicable'])->nullable();
            $table->text('license')->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->enum('insured', ['yes', 'no', 'not_applicable'])->nullable();
            $table->date('gl_insurance_expiry_date')->nullable();
            $table->text('gl_insurance_carrier_name')->nullable();
            $table->text('gl_insurance_carrier_phone')->nullable();
            $table->text('gl_insurance_carrier_email_address')->nullable();
            $table->enum('Workers_comp_available', ['yes', 'no', 'not_applicable'])->nullable();
            $table->text('wc_insurance_carrier_name')->nullable();
            $table->text('wc_insurance_carrier_phone')->nullable();
            $table->text('wc_insurance_carrier_email_address')->nullable();
            $table->date('wc_insurance_expiry_date')->nullable();
            $table->enum('contract_signed', ['yes', 'no', 'not_applicable'])->nullable();
            $table->date('contract_signed_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_contracts', function (Blueprint $table) {
            //
        });
    }
};
