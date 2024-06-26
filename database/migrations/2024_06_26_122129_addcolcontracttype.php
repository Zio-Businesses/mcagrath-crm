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
        Schema::table('vendor_contracts', function (Blueprint $table) {
            $table->enum('contractor_type', ['Air Duct Cleaning','Appliances & Repair','Architects','Biohazard Cleanup','Building Supplies','Cabinetry','Carpenters','Carpet Cleaning','Chimney Sweeps','Countertop Installation','Damage Restoration','Decks & Railing','Demolition Services','Door Sales/Installation','Drywall Installation & Repair','Electricians','Environmental Abatement','Environmental Testing','Excavation Services','Fences & Gates','Fire Protection Services','Fireplace Services','Flooring','Foundation Repair','Furniture Assembly','Garage Door Services','Gardeners','General Contractors','Generator Installation/Repair','Grout Services','Gutter Services','Handyman','Heating & Air Conditioning/HVAC','Home Cleaning','Hydro-jetting','Insulation Installation','Irrigation','Junk Removal & Hauling','Keys & Locksmiths','Landscape Architects or Designers','Landscaping','Lawn Services','Lighting Fixtures & Equipment','Masonry/Concrete','Movers','Painters','Patio Coverings','Pest Control','Plumbing','Pool & Hot Tub Service','Pressure Washers','Roofing','Security Systems','Septic Services','Shades & Blinds','Shutters','Siding','Structural Engineers','Stucco Services','Tiling','Tree Services','Water Heater Installation/Repair','Water Purification Services','Waterproofing','Well Drilling','Wildlife Control','Window Washing','Windows Installation'])->nullable();
            $table->string('distance_covered')->nullable();
            $table->text('coverage_cities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_contracts', function (Blueprint $table) {
            //
        });
    }
};
