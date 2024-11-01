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
            $table->json('project_sub_category')->nullable();
            $table->json('project_type')->nullable();
            $table->json('project_priority')->nullable();
            $table->json('project_status')->nullable();
            $table->json('delayed_by')->nullable();
            $table->json('client_id')->nullable();
            $table->json('city')->nullable();
            $table->json('state')->nullable();
            $table->json('county')->nullable();
            $table->json('project_members')->nullable();
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
