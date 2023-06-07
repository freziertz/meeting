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
        Schema::create('presenters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presenter_id'); // user_id
            $table->foreignId('agenda_id');
            $table->foreignId('meeting_id');
            $table->foreignId('account_id');
            $table->foreignId('created_by'); // login user who create the action status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presenters');
    }
};
