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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->foreign(columns: 'business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign(columns: 'product_id')->references('id')->on('products')->onDelete('cascade');
            $table->double('quantity', 10, 2);
            $table->enum('status',  ['In Progress', 'Completed', 'Pending'])->default('Pending');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
