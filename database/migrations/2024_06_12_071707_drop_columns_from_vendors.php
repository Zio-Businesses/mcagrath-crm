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
        Schema::table('vendors', function (Blueprint $table) {
            $columns = [
                'company_name',
                'street_address',
                'city',
                'state',
                'zip_code',
                'office',
                'cell',
                'website',
                'company_logo',
                'licensed',
                'license',
                'license_expiry_date',
                'insured',
                'gl_insurance_expiry_date',
                'gl_insurance_carrier_name',
                'gl_insurance_carrier_phone',
                'gl_insurance_carrier_email_address',
                'Workers_comp_available',
                'wc_insurance_carrier_name',
                'wc_insurance_carrier_phone',
                'wc_insurance_carrier_email_address',
                'wc_insurance_expiry_date',
                'contract_signed',
                'contract_signed_date',
            ];

            $table->dropColumn($columns);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            //
        });
    }
};
