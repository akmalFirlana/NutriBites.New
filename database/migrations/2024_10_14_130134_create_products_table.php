<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('nutrition_info')->nullable(); 
            $table->string('category')->nullable();
            $table->json('images')->nullable(); 
            $table->timestamps();
            $table->integer('shelf_life')->nullable(); // daya tahan produk dalam hari
            $table->float('weight')->nullable(); // berat produk dalam kilogram
            $table->unsignedBigInteger('shipping_address_id')->nullable(); // ID alamat tujuan pengiriman
            $table->string('bpom_license')->nullable(); // izin edar BPOM
            $table->integer('sold')->default(0); // jumlah terjual
            $table->float('rating')->nullable(); // rata-rata rating produk
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
