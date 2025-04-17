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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id');

            $table->integer('has_options');

            $table->unsignedBigInteger('size_option_id')->nullable();
            $table->unsignedBigInteger('base_option_id')->nullable();
            $table->unsignedBigInteger('border_option_id')->nullable();

            $table->integer('quantity');
            $table->string("total");
            $table->timestamps();

            $table->foreign('size_option_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('base_option_id')->references('id')->on('options')->onDelete('set null');
            $table->foreign('border_option_id')->references('id')->on('options')->onDelete('set null');

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
