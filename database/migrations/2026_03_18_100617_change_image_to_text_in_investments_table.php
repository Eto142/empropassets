<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cloudinary URLs are longer than 255 chars — switch image columns to text
        Schema::table('investments', function (Blueprint $table) {
            $table->text('image')->nullable()->change();
        });

        Schema::table('user_investments', function (Blueprint $table) {
            $table->text('image')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('investments', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });

        Schema::table('user_investments', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
};
