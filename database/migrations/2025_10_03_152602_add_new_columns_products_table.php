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
        Schema::table('products', function (Blueprint $table) {
        $table->unsignedBigInteger('subcategory_id')->nullable();
        $table->foreign('subcategory_id')->references('id')->on('master_types')->onDelete('set null');
        $table->enum('type',['Product','Service'])->nullable();
        $table->text('overview')->nullable();
        $table->text('specification')->nullable();
        $table->text('application')->nullable();
        $table->dropColumn('compare_price');
        $table->dropColumn('cost_price');
        $table->dropColumn('product_image');
        $table->dropColumn('brand');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
