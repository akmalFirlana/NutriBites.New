<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('discussion_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discussion_id')->constrained()->onDelete('cascade'); // Diskusi terkait
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User yang menjawab
            $table->text('content'); // Isi balasan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussion_replies');
    }
}
;
