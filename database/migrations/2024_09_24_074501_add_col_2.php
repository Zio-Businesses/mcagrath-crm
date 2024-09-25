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
        Schema::table('vendor_estimates', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable()->index('project_estimates_project_id_foreign');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_estimates', function (Blueprint $table) {
            //
        });
    }
};
