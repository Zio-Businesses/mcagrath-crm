<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('status_leads', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedInteger('company_id'); // Matches leads.company_id (int(10) unsigned)
            $table->string('status');
            $table->timestamps();

            // Correct foreign key constraint
            $table->foreign('company_id')->references('company_id')->on('leads')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('status_leads');
    }
};
