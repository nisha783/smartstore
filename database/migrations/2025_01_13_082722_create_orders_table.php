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
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->string('status');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->json('shipping_address');
            $table->json('billing_address');
            $table->string('shipping_method');
            $table->decimal('shipping_cost', 8, 2);
            $table->decimal('tax', 8, 2);
            $table->decimal('discount', 8, 2)->default(0);
            $table->text('notes')->nullable();  
            $table->timestamps();
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
