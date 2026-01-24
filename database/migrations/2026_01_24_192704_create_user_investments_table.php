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

        $table->string('name');
        $table->string('type');
        $table->decimal('historic_yield', 5, 2);
        $table->decimal('total_assets', 15, 2);
        $table->decimal('min_investment', 15, 2);
        $table->string('image')->nullable();
        $table->string('status');

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
