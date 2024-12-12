<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('order_id', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('requested_video_id');
            $table->unsignedBigInteger('amount');
            $table->json('gmo_access')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('cancel_description')->nullable();
            $table->datetime('cancel_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('requested_video_id')->references('id')->on('requested_videos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
