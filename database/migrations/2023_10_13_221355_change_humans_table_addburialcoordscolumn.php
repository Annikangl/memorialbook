<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->json('burial_coords')->nullable()->after('birth_place');
        });
    }

    public function down(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->dropColumn('burial_coords');
        });
    }
};
