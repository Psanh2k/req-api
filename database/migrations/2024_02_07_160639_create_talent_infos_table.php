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
        Schema::create('talent_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('phone', 20)->nullable();
            $table->string('avatar')->nullable();
            $table->string('twitter', 20)->nullable();
            $table->string('facebook', 20)->nullable();
            $table->string('instagram', 20)->nullable();
            $table->text('youtube', 2048)->nullable();
            $table->unsignedInteger('follower')->default(0);
            $table->text('inquiries', 500)->nullable();
            $table->string('birthplace', 20)->nullable();
            $table->smallInteger('height')->nullable();
            $table->smallInteger('weight')->nullable();
            $table->smallInteger('size_1')->nullable();
            $table->smallInteger('size_2')->nullable();
            $table->smallInteger('size_3')->nullable();
            $table->string('foot_size', 4)->nullable();
            $table->string('eye_color', 20)->nullable();
            $table->json('hobbies')->nullable();
            $table->string('special_skill', 20)->nullable();
            $table->string('favorite_food', 20)->nullable();
            $table->text('background', 450)->nullable();
            $table->text('comment', 450)->nullable();
            $table->float('star')->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talent_infos');
    }
};
