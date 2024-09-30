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
        Schema::create('vendor_estimate_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_estimates_id')->index('vendor_estimates_files_invoice_id_foreign');
            $table->unsignedInteger('added_by')->nullable()->index('vendor_estimates_files_added_by_foreign');
            $table->unsignedInteger('last_updated_by')->nullable()->index('vendor_estimates_files_last_updated_by_foreign');
            $table->string('filename', 200)->nullable();
            $table->string('hashname', 200)->nullable();
            $table->string('size', 200)->nullable();
            $table->foreign(['added_by'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['last_updated_by'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['vendor_estimates_id'])->references(['id'])->on('vendor_estimates')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_estimate_files');
    }
};
