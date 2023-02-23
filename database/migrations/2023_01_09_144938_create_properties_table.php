<?php

use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->enum('property', Property::PROPERTY_EXTRAS['properties']);
            $table->enum('item_status',  Property::PROPERTY_EXTRAS['item_statuses']);
            $table->foreignId('area_id')->constrained();
            $table->foreignId("area_phase_id")->constrained();
            $table->string('street_number')->nullable();
            $table->string('house_number')->nullable();
            $table->string('plot_number')->nullable();
            $table->string('sector');
            $table->double('size');
            $table->enum("size_unit", Property::PROPERTY_EXTRAS['size_units']);
            $table->double('price');
            $table->enum('orientation',  Property::PROPERTY_EXTRAS['orientations']);
            $table->enum('category',  Property::PROPERTY_EXTRAS['categories']);
            $table->string('extra_land')->nullable()->comment("If any extra information present with property");
            $table->enum('item_condition',  Property::PROPERTY_EXTRAS['item_conditions']);
            $table->string('agency_name')->nullable();
            $table->string('reference_name')->nullable();
            $table->string('reference_mobile')->nullable();
            $table->enum("plot_type",  Property::PROPERTY_EXTRAS['plot_types'])->nullable();
            $table->enum('purchase_status',  Property::PROPERTY_EXTRAS['purchase_statuses'])->default("pending");
            $table->foreignId('user_id')->constrained("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};