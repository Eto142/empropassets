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
        Schema::create('deposits', function (Blueprint $table) {
          $table->id();
$table->foreignId('user_id')->constrained()->onDelete('cascade');
$table->decimal('amount', 15, 2);
$table->enum('payment_method', ['bank', 'crypto']);
$table->enum('crypto_type', ['Bitcoin', 'Ethereum', 'USDT', 'USDC'])->nullable();
$table->string('bank_name')->nullable();
$table->string('account_number')->nullable();
$table->string('proof')->nullable();
$table->tinyInteger('status')->default(0);
$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
