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
        $table->string('type'); // Real Estate Debt, Fund
        $table->string('name'); // Private Credit Fund
        $table->decimal('historic_yield', 5, 2); // 8.30
        $table->decimal('total_assets', 15, 2); // 73000000
        $table->decimal('min_investment', 10, 2); // 100
        $table->integer('investors')->default(0);
        $table->string('image')->nullable();
        $table->enum('status', ['available', 'closed'])->default('available');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
