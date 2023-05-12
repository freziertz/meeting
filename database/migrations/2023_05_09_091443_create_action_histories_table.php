<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('action_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_id');
            $table->foreignId('status_id')->default(999);
            $table->text('notes')->default('New');
            $table->date('as_of_date')->default(Carbon::now()->format('Y-m-d')); // status as off
            $table->foreignId('account_id');
            $table->foreignId('created_by'); // login user who create the action status
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_histories');
    }
};
