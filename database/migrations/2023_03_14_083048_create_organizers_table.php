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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizer_id'); // User id who is responsible in organizing this meeting
            $table->foreignId('meeting_id');
            $table->string('title')->nullable();
            $table->boolean('primary')->default(false);
            $table->foreignId('account_id');
            $table->foreignId('created_by'); // login user who create the meeting
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
