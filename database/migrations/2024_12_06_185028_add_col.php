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
        Schema::table('project_files', function (Blueprint $table) {
            $table->unsignedInteger('project_vendor_id')->nullable()->index('project_files_project_vendor_foreign');
            $table->foreign(['project_vendor_id'])->references(['id'])->on('project_vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_files', function (Blueprint $table) {
            //
        });
    }
};
