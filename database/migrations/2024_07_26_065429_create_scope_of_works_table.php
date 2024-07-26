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
        Schema::create('scope_of_works', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable()->index('project_milestones_project_id_foreign');
            $table->string('category');
            $table->string('sub_category');
            $table->string('contractor_type');
            $table->text('description');
            $table->unsignedInteger('added_by')->nullable()->index('project_milestones_added_by_foreign');
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('CASCADE')->onDelete('CASCADE');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scope_of_works');
    }
};
