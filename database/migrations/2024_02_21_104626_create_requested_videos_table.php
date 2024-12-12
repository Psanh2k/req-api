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
        Schema::create('requested_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('talent_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->tinyInteger('type');
            $table->tinyInteger('is_business')->default(0);
            $table->string('to_relationship', 255);
            $table->string('to_name', 255);
            $table->string('from_name', 255);
            $table->text('content');
            $table->tinyInteger('organization_structure')->nullable();
            $table->string('organization_name', 255)->nullable();
            $table->string('organization_representative', 20)->nullable();
            $table->tinyInteger('contract_term')->nullable();
            $table->tinyInteger('scope_of_use')->nullable();
            $table->tinyInteger('allow_competition')->nullable();
            $table->tinyInteger('secondary_use')->nullable();
            $table->bigInteger('offer_amount')->nullable();
            $table->tinyInteger('direction')->default(1);
            $table->tinyInteger('allow_in_sample')->default(0);
            $table->tinyInteger('add_to_favorites')->nullable()->default(0);
            $table->dateTime('delivery_date')->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->tinyInteger('download_count')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('talent_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_videos');
    }
};
