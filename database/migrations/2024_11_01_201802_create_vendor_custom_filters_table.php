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
        Schema::create('vendor_custom_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('vendor_custom_filters_user_id_foreign');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('state')->nullable();
            $table->json('county')->nullable();
            $table->json('city')->nullable();
            $table->json('contractor_type')->nullable();
            $table->json('created_by')->nullable();
            $table->timestamps();
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_custom_filters');
    }
};
