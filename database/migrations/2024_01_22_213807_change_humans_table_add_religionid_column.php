<?php

use App\Models\Profile\Human\Religion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->foreignIdFor(Religion::class)
                ->nullable()
                ->after('cemetery_id')
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->dropForeignIdFor(Religion::class);
            $table->dropColumn('religion_id');
        });
    }
};
