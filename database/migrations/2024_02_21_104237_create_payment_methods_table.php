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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('bank_name', 20)->nullable();
            $table->tinyInteger('bank_type')->nullable();
            $table->string('bank_code', 4)->nullable();
            $table->string('branch_name', 20)->nullable();
            $table->string('branch_code', 3)->nullable();
            $table->string('account', 20)->nullable();
            $table->string('account_kana', 20)->nullable();
            $table->string('account_type', 100)->nullable();
            $table->string('account_number')->nullable();

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
        Schema::dropIfExists('payment_methods');
    }
};
