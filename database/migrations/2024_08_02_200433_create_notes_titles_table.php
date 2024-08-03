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

        Schema::create('notes_titles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('notes_title')->nullable();
        });

        Log::info(DB::getQueryLog());

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes_titles');
    }
};
