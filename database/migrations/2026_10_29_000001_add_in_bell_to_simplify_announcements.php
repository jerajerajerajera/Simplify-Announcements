<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('simplify_announcements', function (Blueprint $table) {
            $table->boolean('in_bell')->default(false)->after('button_url');
            // When it was put in everyone's bell; it is put there once.
            $table->timestamp('in_bell_at')->nullable()->after('in_bell');
        });
    }

    public function down(): void
    {
        Schema::table('simplify_announcements', function (Blueprint $table) {
            $table->dropColumn(['in_bell', 'in_bell_at']);
        });
    }
};
