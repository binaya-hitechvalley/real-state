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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_type_id')->constrained()->onDelete('restrict');
            $table->foreignId('business_type_id')->constrained()->onDelete('restrict');
            $table->foreignId('state_id')->constrained()->onDelete('restrict');
            $table->foreignId('municipality_id')->nullable()->constrained()->onDelete('restrict');
            
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->enum('price_period', ['total', 'monthly', 'yearly'])->default('total');
            $table->string('land_area_size')->nullable();
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            
            $table->enum('status', ['available', 'sold', 'rented', 'inactive'])->default('available');
            $table->boolean('is_featured')->default(false);
            
            $table->timestamps();
            
            // Indexes for performance
            $table->index('property_type_id');
            $table->index('business_type_id');
            $table->index('state_id');
            $table->index('municipality_id');
            $table->index('status');
            $table->index('is_featured');
            $table->index('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
