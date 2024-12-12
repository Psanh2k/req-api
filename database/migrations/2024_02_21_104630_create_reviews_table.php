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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('talent_id');
            $table->unsignedBigInteger('requested_video_id');
            $table->float('star')->default(0);
            $table->text('content')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('talent_id')->references('id')->on('users');
            $table->foreign('requested_video_id')->references('id')->on('requested_videos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
