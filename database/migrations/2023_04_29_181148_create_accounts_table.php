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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->string('short_name')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('created_by'); // login user who create the meeting

            $table->string('pobox')->nullable();
            $table->string('location')->nullable();
            $table->string('ward')->nullable();
            $table->string('district')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('house_no')->nullable();

            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('website')->nullable();

            $table->string('logo')->nullable();
            $table->string('base_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('third_color')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
