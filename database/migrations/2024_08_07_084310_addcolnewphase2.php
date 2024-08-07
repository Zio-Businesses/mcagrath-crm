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
            $table->enum('v_status', ['Yet to Call', 'Voicemail', 'Unable to Connect','Incorrect Ph # Listed','Duplicate','Initial Pitch Made','Proposal Link Sent','Declined by Vendor','Rejected by MCG','Non-Responsive','Profile Created','Awaiting Docs','Active','Accepted'])->nullable();
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
