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
        Schema::create('agenda_options', function (Blueprint $table) {
            $table->id();
            $table->string('agenda_number_prefix');
            $table->string('agenda_number_suffix');
            $table->string('starting_agenda_number');
            $table->string('schedule_desposal');
            $table->string('days_after_meeting');
            $table->string('on_date');
            $table->boolean('separator');
            $table->foreignId('meeting_id');
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
        Schema::dropIfExists('agenda_options');
    }
};
