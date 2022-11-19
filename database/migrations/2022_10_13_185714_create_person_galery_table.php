<?php

use App\Models\Profile\Human\Human;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('human_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Human::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('item')->nullable();
            $table->string('item_sm')->nullable();
            $table->string('extension',4);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('human_galleries');
        }
    }
};
