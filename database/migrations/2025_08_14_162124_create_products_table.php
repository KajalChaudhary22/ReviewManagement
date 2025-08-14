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
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku');
            $table->string('brand');
            $table->unsignedBigInteger('productCategory_id')->index();
            $table->foreign('productCategory_id')->references('id')->on('masters')->onDelete('cascade');
            $table->double('price', 10, 2);
            $table->double('compare_price', 10, 2);
            $table->double('cost_price', 10, 2);
            $table->double('quantity', 10, 2);
            $table->enum ('status', ['Active', 'Inactive'])->default('Active');
            $table->string('product_image')->nullable();
            $table->unsignedBigInteger('business_id')->index();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->unsignedBigInteger('created_by')->index();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
