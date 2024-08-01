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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_second');
            $table->string('preview_image')->nullable();
            $table->string('detail_image')->nullable();
            $table->text('content');
            $table->unsignedBigInteger('plant_category_id')->nullable();
            $table->timestamps();
            $table->foreign('plant_category_id')->references('id')->on('plant_categories');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
