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
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->text('subject');
            $table->uuid('uuid')->unique();
            $table->string('slug');
            $table->text('notes_to_voters'); // note to voters
            $table->date('voting_deadline');
            $table->integer('status')->default(1); // Uncirculated/Unpublished(1), Circulated/ Published(2), In Progress(3), Closed(4)
            $table->boolean('visible')->default(false);
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
        Schema::dropIfExists('resolutions');
    }
};
