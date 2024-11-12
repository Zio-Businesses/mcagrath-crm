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
        DB::statement("ALTER TABLE `vendor_contracts` CHANGE `status` `status` ENUM('Active','Compliant','Snooze','Non Compliant','DNU','On Hold','InActive') NULL");
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
