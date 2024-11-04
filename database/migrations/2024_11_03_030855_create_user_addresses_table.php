<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('label')->nullable();
            $table->string('recipient_name');
            $table->string('phone_number');
            $table->string('full_address');
            $table->string('postal_code');
            $table->unsignedBigInteger('province_id'); // Add province_id
            $table->unsignedBigInteger('city_id');     // Add city_id
            $table->unsignedBigInteger('district_id'); // Add district_id
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
