<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductAttributesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('shelf_life')->nullable(); // daya tahan produk, dalam hari
            $table->float('weight')->nullable(); // berat produk dalam kilogram
            $table->unsignedBigInteger('shipping_address_id')->nullable(); // ID alamat tujuan pengiriman

            // Menambahkan foreign key untuk shipping_address_id
            $table->foreign('shipping_address_id')->references('id')->on('user_addresses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['shipping_address_id']);
            $table->dropColumn(['shelf_life', 'weight', 'shipping_address_id']);
        });
    }
}
