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
        Schema::table('expenses', function (Blueprint $table) {
            $table->date('pay_date')->nullable();
            $table->unsignedInteger('vendor_id')->nullable()->index('expenses_project_vendor_id_foreign');
            $table->foreign(['vendor_id'])->references(['id'])->on('project_vendors')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('payment_method', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            //
        });
    }
};
