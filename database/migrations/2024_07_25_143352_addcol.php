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
            $table->string('delayed_by')->nullable();
            $table->date('inspection_date')->nullable();
            $table->time('inspection_time')->nullable();
            $table->date('re_inspection_date')->nullable();
            $table->time('re_inspection_time')->nullable();
            $table->date('bid_submitted')->nullable();
            $table->date('bid_rejected')->nullable();
            $table->date('bid_approval')->nullable();
            $table->date('work_schedule_date')->nullable();
            $table->time('work_schedule_time')->nullable();
            $table->date('work_schedule_re_date')->nullable();
            $table->time('work_schedule_re_time')->nullable();
            $table->date('work_completion_date')->nullable();

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
