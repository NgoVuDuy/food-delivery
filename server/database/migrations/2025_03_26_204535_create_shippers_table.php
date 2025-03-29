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
        Schema::create('shippers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('shipper_id');
            $table->integer('status')->default(-1);
            $table->string('latitude');
            $table->string('longitude');

            $table->timestamps();

            $table->foreign('shipper_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipper_locations');
    }
};
