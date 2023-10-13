<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('cemeteries', function (Blueprint $table) {
            $table->json('address_coords')->nullable()->after('address');
        });
    }

    public function down(): void
    {
        Schema::table('cemeteries', function (Blueprint $table) {
            $table->dropColumn('address_coords');
        });
    }
};
