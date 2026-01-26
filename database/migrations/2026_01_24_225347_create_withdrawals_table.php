<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // assuming withdrawals are tied to users
            $table->enum('withdrawal_type', ['bank', 'crypto'])->default('bank');
            $table->decimal('amount', 15, 2);
            
            // Bank fields
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('swift_code')->nullable();
            
            // Crypto fields
            $table->string('crypto_network')->nullable();
            $table->string('wallet_address')->nullable();
            
            // Common fields
            $table->text('narration')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->timestamps();

            // Foreign key constraint assuming you have a users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
