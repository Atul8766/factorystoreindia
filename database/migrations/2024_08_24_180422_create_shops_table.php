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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // Shop name
            $table->string('logo')->nullable();  // Shop logo, nullable in case logo isn't uploaded
            $table->text('address');  // Shop address
            $table->boolean('status')->default(1);  // Status: Active/Inactive
            $table->timestamps();  // Automatically adds created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
