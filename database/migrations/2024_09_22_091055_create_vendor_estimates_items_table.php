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
        Schema::create('vendor_estimates_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_estimate_id')->index('vendor_estimate_items_estimate_id_foreign');
            $table->foreign(['vendor_estimate_id'])->references(['id'])->on('vendor_estimates')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('item_name');
            $table->text('item_summary')->nullable();
            $table->enum('type', ['item', 'discount', 'tax'])->default('item');
            $table->double('quantity', 16, 2);
            $table->double('unit_price', 16, 2);
            $table->double('amount', 16, 2);
            $table->string('taxes')->nullable();
            $table->string('hsn_sac_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_estimates_items');
    }
};
