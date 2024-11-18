<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User yang bertanya
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Produk terkait
            $table->text('content'); // Isi pertanyaan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussions');
    }
};
