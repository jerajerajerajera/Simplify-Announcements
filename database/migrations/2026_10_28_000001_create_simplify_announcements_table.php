<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('simplify_announcements', function (Blueprint $table) {
            $table->id();
            $table->string('category', 16)->default('info');
            $table->string('title', 120);
            $table->text('body')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->string('audience', 16)->default('everyone');
            $table->string('button_label', 40)->nullable();
            $table->string('button_url', 2048)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
            $table->index(['starts_at', 'ends_at']);
        });

        // One row per account that unpinned an announcement: its bar is gone for that account.
        Schema::create('simplify_announcement_dismissals', function (Blueprint $table) {
            $table->foreignId('announcement_id')->constrained('simplify_announcements')->cascadeOnDelete();
            $table->unsignedInteger('user_id');
            $table->timestamp('created_at')->nullable();

            $table->primary(['announcement_id', 'user_id']);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('simplify_announcement_dismissals');
        Schema::dropIfExists('simplify_announcements');
    }
};
