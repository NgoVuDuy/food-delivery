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
        Schema::create('staffs', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('store_location_id');
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('store_location_id')->references('id')->on('store_locations')->onDelete('cascade');
        });
    }
    /**  
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffs');
    }
};
