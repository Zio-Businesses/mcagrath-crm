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
        Schema::table('project_custom_filters', function (Blueprint $table) {
            $table->date('start_date_nxt')->nullable();
            $table->date('end_date_nxt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_custom_filters', function (Blueprint $table) {
            //
        });
    }
};
