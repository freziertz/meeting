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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('presenter_id')->nullable(); // presenter_id = user_id // Participant
            $table->integer('minutes')->nullable(); // minutes allotted for agenda
            $table->foreignId('meeting_id');
            $table->foreignId('contributor_id');
            $table->foreignId('purpose_id')->nullable();
            $table->string('external_url')->nullable();
            $table->boolean('recurring')->nullable();
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
        Schema::dropIfExists('agendas');
    }
};
