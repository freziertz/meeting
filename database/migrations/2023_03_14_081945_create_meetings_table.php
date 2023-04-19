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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_type_id');
            $table->string('title');
            $table->string('venue');
            $table->string('google_map_url')->nullable();
            $table->foreignId('timezone_id')->nullable();           
            $table->text('description')->nullable();
            $table->text('participants_notes')->nullable();
            $table->text('organizer_notes')->nullable();
            $table->integer('reminder')->nullable();
            $table->integer('status')->default(1); // Unpublished(1), Published(2), In Progress(3), Closed(4)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
