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
        Schema::create('lead_vendor_custom_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('lead_vendor_custom_filters_user_id_foreign');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('state')->nullable();
            $table->json('county')->nullable();
            $table->json('city')->nullable();
            $table->json('contractor_type')->nullable();
            $table->json('created_by')->nullable();
            $table->json('status')->nullable();
            $table->json('lead_source')->nullable();
            $table->timestamps();
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_vendor_custom_filters');
    }
};
