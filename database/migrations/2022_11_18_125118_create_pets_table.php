<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User\User::class)->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('slug')->nullable()->index();
            $table->string('breed');
            $table->string('avatar')->nullable();
            $table->string('banner')->nullable();
            $table->date('birth_date');
            $table->date('death_date');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->foreignIdFor(\App\Models\Profile\DeathReason::class)
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();
        });

        Schema::create('pet_galleries', function(Blueprint $table) {
           $table->id();
           $table->foreignIdFor(\App\Models\Profile\Pet::class)->constrained()->cascadeOnDelete();

           $table->string('item');
           $table->string('item_sm');
           $table->string('extension', 4);
        });
    }

    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('pet_galleries');
            Schema::dropIfExists('pets');
        }
    }
};
