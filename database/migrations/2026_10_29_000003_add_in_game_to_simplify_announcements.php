<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('simplify_announcements', function (Blueprint $table) {
            $table->boolean('in_game')->default(false)->after('pushed_to');
            // Server ids; empty: all servers.
            $table->json('in_game_servers')->nullable()->after('in_game');
            // Minutes between two posts while it shows; 0: only once.
            $table->unsignedSmallInteger('in_game_repeat')->default(0)->after('in_game_servers');
            $table->timestamp('in_game_at')->nullable()->after('in_game_repeat');
            // {"sent": n, "offline": n, "unsupported": n, "failed": n} of the last post.
            $table->json('in_game_result')->nullable()->after('in_game_at');
        });

        // A root admin's own chat command per egg. "-" skips that game.
        Schema::create('simplify_announcement_commands', function (Blueprint $table) {
            $table->unsignedInteger('egg_id')->primary();
            $table->string('command', 200);
            $table->timestamps();

            $table->foreign('egg_id')->references('id')->on('eggs')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('simplify_announcement_commands');
        Schema::table('simplify_announcements', function (Blueprint $table) {
            $table->dropColumn(['in_game', 'in_game_servers', 'in_game_repeat', 'in_game_at', 'in_game_result']);
        });
    }
};
