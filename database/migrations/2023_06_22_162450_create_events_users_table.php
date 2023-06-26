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
        Schema::create('events_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');

            $table->index('user_id', 'events_users_user_idx');
            $table->index('event_id', 'events_users_event_idx');

            $table->foreign('user_id', 'events_users_user_fk')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('event_id', 'events_event_user_fk')->on('events')->references('id')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_users');
    }
};
