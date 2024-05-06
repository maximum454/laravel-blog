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
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_from');
            $table->unsignedBigInteger('user_to');
            $table->timestamps();

            $table->index('user_from','user_from_idx');
            $table->index('user_to','user_to_idx');

            $table->foreign('user_from','user_from_fk')->on('users')->references('id');
            $table->foreign('user_to','user_to_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
