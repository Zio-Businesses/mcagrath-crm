<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::enableQueryLog();
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('state')->nullable();
            $table->string('county')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('timezone')->nullable();
            $table->timestamps();
        });
        Log::info(DB::getQueryLog());
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
