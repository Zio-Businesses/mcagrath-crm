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
        Schema::create('property_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('property_address')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('county')->nullable();
            $table->string('property_type')->nullable();
            $table->string('yearbuilt')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('house_size')->nullable();
            $table->string('lotsize')->nullable();
            $table->string('occupancy_status')->nullable();
            $table->string('lockboxlocation')->nullable();
            $table->string('lockboxcode')->nullable();
            $table->json('utility_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_details');
    }
};
