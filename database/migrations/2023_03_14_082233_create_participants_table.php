<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// This table is review from document review, voters from resolutions, and participants from meeting

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id'); // user id who is responsible to attend meeting
            // $table->foreignId('meeting_id');
            $table->string('title')->nullable();
            $table->foreignId('group_id')->nullable(); // check if team can be used
            $table->foreignId('meeting_role_id')->nullable();
            $table->foreignId('account_id');
            $table->foreignId('created_by'); // login user who create the meeting
            $table->unsignedBigInteger('participantable_id')->comment('meeting_id'); //meeting_id
            $table->string('participantable_type');
            $table->boolean('status')->nullable();
            $table->text('comment')->nullable();
            $table->integer('casts')->nullable();  // null, 1 yes , 2 no , abscond
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
