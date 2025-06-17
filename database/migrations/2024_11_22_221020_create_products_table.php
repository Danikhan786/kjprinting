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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Product name
            $table->decimal('price', 10, 2); // Product price
            $table->string('image'); // Main product image
            $table->text('short_description')->nullable(); // Short description
            $table->longText('long_description')->nullable(); // Long description
            $table->json('images')->nullable()->default('[]'); // Default should be a JSON-encoded string
            $table->string('video')->nullable(); // Product video URL or path
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Category ID (foreign key)
            $table->string('slug')->unique(); // For SEO-friendly URL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
