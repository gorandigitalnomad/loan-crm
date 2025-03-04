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
        Schema::create('home_loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->unique()->constrained()->onDelete('cascade');
            $table->foreignId('adviser_id')->constrained('advisers')->onDelete('cascade');
            $table->decimal('property_value', 12, 2);
            $table->decimal('down_payment', 12, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_loans');
    }
};
