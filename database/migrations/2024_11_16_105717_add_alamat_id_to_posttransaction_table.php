<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_transactions', function (Blueprint $table) {
            $table->string('recipient_name')->after('shipping_cost')->nullable();
            $table->string('recipient_phone')->after('recipient_name')->nullable();
            $table->text('full_address')->after('recipient_phone')->nullable();
        });
    }

    public function down()
    {
        Schema::table('posttransactions', function (Blueprint $table) {
            $table->dropColumn(['recipient_name', 'recipient_phone', 'full_address']);
        });
    }
};
