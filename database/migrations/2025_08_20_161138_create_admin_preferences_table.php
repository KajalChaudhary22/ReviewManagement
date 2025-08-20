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
        Schema::create('admin_preferences', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('admin_id'); // if per-admin
            $table->integer('results_per_page')->default(25);
            $table->boolean('notif_user')->default(true);
            $table->boolean('notif_business')->default(true);
            $table->boolean('notif_review')->default(true);
            $table->string('notification_method')->default('email'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_preferences');
    }
};
