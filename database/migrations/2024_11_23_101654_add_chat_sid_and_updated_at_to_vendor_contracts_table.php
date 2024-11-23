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
            $table->string('chat_sid')->nullable()->after('id');
            $table->timestamp('sms_updated_at')->useCurrent()->after('chat_sid'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_contracts', function (Blueprint $table) {
            $table->dropColumn('chat_sid'); 
            $table->dropColumn('sms_updated_at'); 
        });
    }
};
