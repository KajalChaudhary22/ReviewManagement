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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id')->nullable(); // optional if tracking user
            $table->tinyInteger('rating'); // or float('rating', 2, 1) if you allow decimals
            $table->text('comment')->nullable();
            $table->timestamps();

             // Add foreign key constraints if necessary
             $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
