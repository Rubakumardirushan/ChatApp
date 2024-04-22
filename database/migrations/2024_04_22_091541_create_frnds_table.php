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
        Schema::create('frnds', function (Blueprint $table) {
            $table->id();
            $table->integer('frnd_request_sender_id');
            $table->integer('frnd_request_receiver_id');
            $table->string('status')->default('pending');
            $table->string('frnd_request_accepted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frnds');
    }
};
