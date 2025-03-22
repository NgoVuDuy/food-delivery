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
        Schema::create('carts', function (Blueprint $table) {
            
            $table->id(); //

            // $table->unsignedBigInteger('product_id'); // id sản phẩm
            $table->unsignedBigInteger('user_id'); // id khách hàng
            // $table->integer('quantity'); // số lượng sản phẩm

            // // đối với pizza
            // $table->string('size')->nullable(); //  kích cỡ
            // $table->string('base')->nullable(); // đế bánh
            // $table->string('border')->nullable(); // viền bánh
            // $table->double('total'); // Giá tiền

            $table->timestamps();

            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
