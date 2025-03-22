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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('has_options');
            $table->integer('quantity');
            $table->double('total-price');
            $table->unsignedBigInteger('size_option_id')->nullable();
            $table->unsignedBigInteger('base_option_id')->nullable();
            $table->unsignedBigInteger('border_option_id')->nullable();
            $table->timestamps();

            $table->foreign('size_option_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('base_option_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('border_option_id')->references('id')->on('options')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
