<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->foreignId('burial_id')->after('cemetery_id')->nullable()
                ->references('id')->on('burials')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->dropForeign('humans_burial_id_foreign');
            $table->dropColumn('burial_id');
        });
    }
};
