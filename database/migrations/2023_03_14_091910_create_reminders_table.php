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
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reminderable_id'); //meeting id, action id
            $table->string('reminderable_type');
            $table->integer('reminder');
            $table->date('reminder_date');
            $table->foreignId('reminder_type_id');
            $table->foreignId('account_id');
            $table->foreignId('created_by'); // login user who create the meeting
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
