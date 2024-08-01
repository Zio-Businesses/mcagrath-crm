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
        Schema::create('project_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('amname')->nullable();
            $table->string('amph')->nullable();
            $table->string('amemail')->nullable();
            $table->string('tenant_name_1')->nullable();
            $table->string('tenant_email_1')->nullable();
            $table->string('tenant_phone_1')->nullable();
            $table->string('tenant_name_2')->nullable();
            $table->string('tenant_email_2')->nullable();
            $table->string('tenant_phone_2')->nullable();
            $table->string('tenant_name_3')->nullable();
            $table->string('tenant_email_3')->nullable();
            $table->string('tenant_phone_3')->nullable();
            $table->string('tenant_name_4')->nullable();
            $table->string('tenant_email_4')->nullable();
            $table->string('tenant_phone_4')->nullable();
            $table->string('tenant_name_5')->nullable();
            $table->string('tenant_email_5')->nullable();
            $table->string('tenant_phone_5')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_contacts');
    }
};
