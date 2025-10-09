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
        Schema::create('specialist_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('organization');
            $table->string('department')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('urgency')->default('medium');
            $table->timestamps();

            // (Optional) Foreign keys — only if related tables exist
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialist_requests');
    }
};
