<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('simplify_announcements', function (Blueprint $table) {
            $table->boolean('push')->default(false)->after('in_bell_at');
            // How many devices Simplify sent it to as an app notification, added up.
            $table->unsignedInteger('pushed_to')->default(0)->after('push');
        });
    }

    public function down(): void
    {
        Schema::table('simplify_announcements', function (Blueprint $table) {
            $table->dropColumn(['push', 'pushed_to']);
        });
    }
};
