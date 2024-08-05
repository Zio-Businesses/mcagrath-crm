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
        Schema::create('vendor_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('vendor_id')->nullable()->index('vendor_id_notes_foreign');
            $table->foreign(['vendor_id'])->references(['id'])->on('vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('notes_title')->nullable();
            $table->string('created_by')->nullable();
            $table->text('notes_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_notes');
    }
};
