<?php

use App\Models\Profile\DeathReason;
use App\Models\Profile\Hobby;
use App\Models\Profile\Pet\Pet;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('slug')->nullable()->index();
            $table->string('breed');
            $table->string('avatar')->nullable();
            $table->string('banner')->nullable();
            $table->text('description')->nullable();
            $table->date('date_birth')->nullable();
            $table->date('date_death')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('burial_place')->nullable();
            $table->string('death_reason')->nullable();

            $table->timestamps();
        });

//        Schema::create('pet_galleries', function(Blueprint $table) {
//           $table->id();
//           $table->foreignIdFor(Pet::class)->constrained()->cascadeOnDelete();
//
//           $table->string('item');
//           $table->string('item_sm')->nullable();
//           $table->string('extension', 4);
//        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('pet_galleries');
            Schema::dropIfExists('pets');
        }
    }
};
