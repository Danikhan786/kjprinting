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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Order ID
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to the users table (optional for guest users)
            $table->unsignedBigInteger('product_id'); // Foreign key to the products table
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('country');
            $table->string('state');
            $table->string('postal_code');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->integer('quantity')->nullable()->change();
            $table->decimal('subtotal', 10, 2); // Total price of the product(s) in the order
            $table->decimal('total', 10, 2); // Final price, after applying taxes, shipping, etc.
            $table->string('payment_method'); // E.g. 'Cash On Delivery' or 'Credit Card'
            $table->timestamps(); // For created_at and updated_at

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
