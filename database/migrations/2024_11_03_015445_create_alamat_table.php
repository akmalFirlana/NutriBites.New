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
        Schema::create('alamat', function (Blueprint $table) {
            $table->id('postal_id');
            $table->unsignedBigInteger('subdis_id');
            $table->unsignedBigInteger('dis_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('prov_id');
            $table->string('postal_code');
            $table->string('subdis_name');
            $table->string('dis_name');
            $table->string('city_name');
            $table->string('prov_name');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
