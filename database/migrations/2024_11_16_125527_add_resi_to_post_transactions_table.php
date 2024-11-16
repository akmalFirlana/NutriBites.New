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
        Schema::table('post_transactions', function (Blueprint $table) {
            $table->string('resi')->nullable()->after('shipping_method');
        });
    }

    public function down()
    {
        Schema::table('post_transactions', function (Blueprint $table) {
            $table->dropColumn('resi');
        });
    }

};
