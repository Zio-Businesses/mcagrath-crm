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
        Schema::create('vendor_in_chats', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_name');
            $table->string('vendor_country_code', 5);
            $table->string('vendor_phone')->unique();
            $table->string('channel_sid');
            $table->string('last_msg')->nullable();
            $table->string('company_logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_in_chats');
    }
};
