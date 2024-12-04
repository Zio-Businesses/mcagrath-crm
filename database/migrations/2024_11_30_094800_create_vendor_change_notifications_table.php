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
        Schema::create('vendor_change_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_type')->nullable();
            $table->json('sow_id')->nullable();
 	        $table->string('project_amount')->nullable();
            $table->text('add_notes')->nullable();
            $table->enum('link_status', ['Accepted', 'Rejected', 'Removed', 'Sent'])->nullable();
            $table->date('accepted_date')->nullable();
            $table->date('due_date')->nullable();
            $table->unsignedInteger('project_vendor_id')->nullable()->index('change_notification_vendor_foreign');
            $table->foreign(['project_vendor_id'])->references(['id'])->on('project_vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedInteger('link_sent_by')->nullable()->index('change_notification_vendor_link_by_foreign');
            $table->foreign(['link_sent_by'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_change_notifications');
    }
};
