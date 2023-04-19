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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agenda_id');
            $table->string('name');
            $table->foreignId('user_id');
            $table->foreignId('meeting_id');
            $table->date('due_date');
            $table->integer('reminder_days');// Remind assignee 3 days before due date
            $table->string('status');
            $table->date('as_of_date'); // status as off
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
