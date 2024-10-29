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
        Schema::table('project_vendors', function (Blueprint $table) {
            $table->date('cancelled_date')->nullable();
            $table->string('cancelled_reason')->nullable();
            $table->date('invoiced_date')->nullable();
            $table->string('invoiced_amount')->nullable();
            $table->date('paid_date')->nullable();
            $table->string('paid_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project_vendors', function (Blueprint $table) {
            //
        });
    }
};
