<?php

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
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('slug')->nullable()->index();

            $table->string('name');
            $table->string('breed');
            $table->text('description')->nullable();
            $table->date('date_birth')->nullable();
            $table->date('date_death')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('burial_place')->nullable();
            $table->string('death_reason')->nullable();
            $table->boolean('is_celebrity')->default(false);
            $table->string('access')->nullable();
            $table->string('status', 16);

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('pets');
        }
    }
};
