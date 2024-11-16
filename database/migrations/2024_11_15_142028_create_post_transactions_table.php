<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('post_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'shipped', 'delivered'])->default('pending');
            $table->string('shipping_method')->nullable();
            $table->string('estimated_delivery')->nullable();
            $table->string('order_status')->default('pending');
            $table->string('payment_type')->nullable();
            $table->dateTime('transaction_time')->nullable();
            $table->decimal('shipping_cost', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_transactions');
    }
}
