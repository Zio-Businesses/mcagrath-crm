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
        Schema::create('project_vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id')->nullable()->index('project_vendor_project_id_foreign');
            $table->string('vendor_name')->nullable();
            $table->string('vendor_phone')->nullable();
            $table->string('vendor_email_address')->nullable();
            $table->json('sow_id')->nullable();
	        $table->string('project_type')->nullable();
 	        $table->string('project_amount')->nullable();
            $table->text('add_notes')->nullable();
            $table->boolean('link_access')->default(true);
            $table->enum('link_status', ['Accepted', 'Rejected', 'Removed', 'Sent'])->nullable();
            $table->date('accepted_date')->nullable();
            $table->string('wo_status')->nullable();
            $table->date('inspection_date')->nullable();
            $table->time('inspection_time')->nullable();
            $table->date('re_inspection_date')->nullable();
            $table->time('re_inspection_time')->nullable();
            $table->date('bid_ecd')->nullable();
            $table->date('bid_submitted_date')->nullable();
            $table->string('bid_amount')->nullable();
            $table->date('bid_rejected_date')->nullable();
            $table->date('bid_approval_date')->nullable();
            $table->date('work_schedule_date')->nullable();
            $table->time('work_schedule_time')->nullable();
            $table->date('work_schedule_re_date')->nullable();
            $table->time('work_schedule_re_time')->nullable();
            $table->date('work_completion_date')->nullable();
            $table->date('work_ecd')->nullable();
            $table->string('bid_approved_amount')->nullable();
            $table->text('link')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable()->index('project_vendor_vendors_foreign');
            $table->foreign(['vendor_id'])->references(['id'])->on('vendor_contracts')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->unsignedInteger('link_sent_by')->nullable()->index('project_vendor_link_by_foreign');
            $table->foreign(['link_sent_by'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['project_id'])->references(['id'])->on('projects')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_vendors');
    }
};
