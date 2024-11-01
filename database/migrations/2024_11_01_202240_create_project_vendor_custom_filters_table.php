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
        Schema::create('project_vendor_custom_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('project_vendor_custom_filters_user_id_foreign');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('project_members')->nullable();
            $table->json('client_id')->nullable();
            $table->json('vendor_id')->nullable();
            $table->json('link_status')->nullable();
            $table->json('work_order_status')->nullable();
            $table->json('project_status')->nullable();
            $table->json('project_category')->nullable();
            $table->timestamps();
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_vendor_custom_filters');
    }
};
