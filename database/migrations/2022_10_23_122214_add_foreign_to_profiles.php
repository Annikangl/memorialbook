<?php

use App\Models\Profile\Cemetery\Cemetery;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('humans', function (Blueprint $table) {
            $table->foreignIdFor(Cemetery::class)->after('children_id')->nullable()
                ->constrained();
        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::table('humans', function (Blueprint $table) {
                $table->dropForeignIdFor(\App\Models\Profile\Cemetery\Cemetery::class);
            });
        }
    }
};
