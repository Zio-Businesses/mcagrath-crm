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
        Schema::table('projects', function (Blueprint $table) {
                        
            $table->unsignedInteger('project_manager_id')->nullable()->index('project_manager_user_id_foreign');
            $table->foreign('project_manager_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->unsignedInteger('project_scheduler_id')->nullable()->index('project_scheduler_user_id_foreign');
            $table->foreign('project_scheduler_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->unsignedInteger('vendor_recruiter_id')->nullable()->index('vendor_recruiter_user_id_foreign');
            $table->foreign('vendor_recruiter_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
