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
        Schema::create('orders', function (Blueprint $table) {

            $table->id(); // mã đơn hàng
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('payment_method');

            $table->string('name'); // tên người đặt -> người dùng vô danh
            $table->string('phone'); // sdt người đặt -> người dùng vô danh
            
            $table->string('place_name'); // Địa điểm giao hàng
            $table->string('place_id'); // Thông tin địa điểm giao hàng
            $table->unsignedBigInteger('store_location_id')->nullable(); // Chi nhánh giao hàng

            $table->string('total_price'); // Tổng tiền đơn hàng

            $table->unsignedBigInteger('user_id')->nullable(); // ID shipper
            $table->unsignedBigInteger('shipper_id')->nullable(); // ID shipper
            $table->unsignedBigInteger('staff_id')->nullable(); // ID staff

            $table->string('status');// Trạng thái đơn hàng

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('shipper_id')->references('id')->on('users')->onDelete('set null');

            $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('set null');

            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('set null');

            $table->foreign('store_location_id')->references('id')->on('store_locations')->onDelete('set null');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
