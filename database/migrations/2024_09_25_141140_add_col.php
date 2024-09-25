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
        Schema::table('vendor_estimates_items', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id')->nullable()->index('vendor_estimates_unit_foreign');
            $table->foreign(['unit_id'])->references(['id'])->on('unit_types')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_estimates_items', function (Blueprint $table) {
            //
        });
    }
};
