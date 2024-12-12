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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('app_id', 12)->unique()->nullable();
            $table->unsignedBigInteger('agency_id')->index()->nullable();
            $table->unsignedTinyInteger('role');
            $table->string('username', 20);
            $table->string('email');
            $table->string('password');
            $table->unsignedTinyInteger('status')->default(0);
            $table->unsignedTinyInteger('setup_flag')->default(0);
            $table->unsignedTinyInteger('subscription')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
