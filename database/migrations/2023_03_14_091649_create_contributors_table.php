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
        Schema::create('contributors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contributor_id'); // user id who is adenda contributor for this meeting
            // $table->foreignId('meeting_id');
            $table->string('title')->nullable();
            $table->foreignId('account_id');
            $table->foreignId('created_by'); // login user who create the meeting
            $table->unsignedBigInteger('contributable_id')->comment('meeting_id'); //meeting_id
            $table->string('contributable_type');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributors');
    }
};
