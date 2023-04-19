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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');        
            $table->text('description')->nullable();
            $table->uuid('uuid');
            $table->string('path'); 
            $table->string('webpath'); 
            $table->string('fullpath'); 
            $table->string('filename'); 
            $table->string('extension');
            $table->string('mime_type');
            $table->string('size');
            $table->string('signature');
            $table->foreignId('user_id');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
