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
            $table->string('company_logo')->change();
            $table->dropColumn('contract_signed');
            $table->dropColumn('contract_signed_date'); 
            $table->string('contract_sign');
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
