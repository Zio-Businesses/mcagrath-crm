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
            $table->string('poc')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('contractor_type')->nullable();
            $table->string('lead_source')->nullable();
            $table->string('website')->nullable();
            $table->date('nxt_date')->nullable();
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
