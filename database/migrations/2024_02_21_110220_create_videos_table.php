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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talent_id')->nullable();
            $table->unsignedBigInteger('requested_video_id')->nullable();
            $table->string('original_name', 100);
            $table->string('name', 100);
            $table->integer('duration')->nullable();
            $table->float('size')->nullable();
            $table->string('path', 255);
            $table->tinyInteger('allow_in_sample')->nullable()->default(0);

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
        Schema::dropIfExists('videos');
    }
};
