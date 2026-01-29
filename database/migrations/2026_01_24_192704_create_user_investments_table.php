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
    Schema::create('user_investments', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->foreignId('investment_id')->constrained()->cascadeOnDelete();

        // Investment transaction details
        $table->integer('shares');
        $table->decimal('share_price', 15, 2);
        $table->decimal('amount', 15, 2);

        // Property snapshot details
        $table->string('name');
        $table->string('type');
        $table->decimal('historic_yield', 5, 2);
        $table->decimal('total_assets', 15, 2);
        $table->decimal('min_investment', 15, 2);
        $table->string('location')->nullable();
        $table->string('size')->nullable();
        $table->integer('bedrooms')->nullable();
        $table->integer('bathrooms')->nullable();
        $table->string('parking')->nullable();
        $table->string('year_built')->nullable();
        $table->text('amenities')->nullable();
        $table->text('description')->nullable();
        $table->string('image')->nullable();
        $table->text('gallery')->nullable();
        $table->tinyInteger('status')->default(1); // 1 = active, 0 = inactive

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_investments');
    }
};
