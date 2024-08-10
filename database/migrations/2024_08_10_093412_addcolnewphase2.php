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
            $table->boolean('license_check')->default(false);
            $table->boolean('gl_insurance_check')->default(false);
            $table->boolean('wc_check')->default(false);
            $table->string('waiver_form_status')->nullable();
            $table->date('form_sent_date')->nullable();
            $table->date('waiver_signed_date')->nullable();
            $table->dropColumn('status');
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
