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
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('story_title', 100)->nullable();
            $table->string('story', 5000)->nullable();
            $table->integer('hearts_count')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('sum_colect')->nullable();
            $table->integer('sum_present')->nullable()->default(0);
            $table->string('person')->nullable();
            $table->integer('person_money')->default(0);
            $table->string('photo', 200)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
