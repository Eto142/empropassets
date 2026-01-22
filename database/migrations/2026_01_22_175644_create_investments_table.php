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
        $table->string('type');                // e.g., Real Estate Debt, Fund
        $table->string('name');                // e.g., Private Credit Fund
        $table->string('historic_yield'); // e.g., 8.3 (%)
        $table->string('total_assets');  // e.g., 73000000 ($)
        $table->string('min_investment'); // e.g., 100
        $table->integer('investors');          // e.g., 1277
        $table->string('status')->default('available'); // available / closed
        $table->string('image')->nullable();   // image path
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
