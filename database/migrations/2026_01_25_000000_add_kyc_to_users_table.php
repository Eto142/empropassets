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
        Schema::table('users', function (Blueprint $table) {
            $table->string('identity_type')->nullable()->comment('Passport, Driver License, National ID, etc.');
            $table->string('identity_document')->nullable()->comment('Path to uploaded front of ID document');
            $table->string('identity_document_back')->nullable()->comment('Path to uploaded back of ID document');
            $table->string('kyc_status')->default('pending')->comment('pending, verified, rejected');
            $table->text('kyc_rejection_reason')->nullable();
            $table->timestamp('kyc_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'identity_type',
                'identity_document',
                'identity_document_back',
                'kyc_status',
                'kyc_rejection_reason',
                'kyc_verified_at',
            ]);
        });
    }
};
