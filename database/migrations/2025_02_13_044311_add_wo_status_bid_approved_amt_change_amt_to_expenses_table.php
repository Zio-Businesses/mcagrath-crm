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
        Schema::table('expenses', function (Blueprint $table) {
            $table->string('wo_status')->nullable()->after('payment_method'); // ✅ Work Order Status
            $table->decimal('bid_approved_amt', 15, 2)->nullable()->after('wo_status'); // ✅ Bid Approved Amount
            $table->decimal('change_amt', 15, 2)->nullable()->after('bid_approved_amt'); // ✅ Change Amount
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn(['wo_status', 'bid_approved_amt', 'change_amt']); // ✅ Rollback

            //
        });
    }
};
