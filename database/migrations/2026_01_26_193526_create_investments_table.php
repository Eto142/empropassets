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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();

            // Basic info
            $table->string('type');                 // e.g., Real Estate Debt, Fund
            $table->string('name');                 // e.g., Private Credit Fund
            $table->string('location')->nullable(); // e.g., Dubai, UAE

            // Financial
            $table->decimal('historic_yield', 5, 2); // e.g., 8.30 (%)
            $table->bigInteger('total_assets');      // e.g., 73000000 ($)
            $table->bigInteger('min_investment');    // e.g., 100 ($)
            $table->decimal('share_price', 12, 2)->nullable(); // optional

            $table->integer('investors');            // e.g., 1277

            // Property details
            $table->decimal('size', 8, 2)->nullable();      // sqft
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('parking')->nullable();
            $table->integer('year_built')->nullable();

            // Description & amenities
            $table->text('description')->nullable();
            $table->json('amenities')->nullable();   // JSON array of strings
            $table->json('gallery')->nullable();     // JSON array of image filenames

            // Images & status
            $table->string('image')->nullable();
            $table->string('status')->default('available'); // available / closed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
