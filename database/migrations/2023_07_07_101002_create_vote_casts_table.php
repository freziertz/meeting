<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vote_casts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id');
            $table->foreignId('agenda_id');
            $table->foreignId('vote_id');
            $table->foreignId('voter_id');
            $table->boolean('choice');
            $table->string('decription')->nullable();
            $table->datetime('from');
            $table->datetime('to');
            $table->boleean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_casts');
    }
};
