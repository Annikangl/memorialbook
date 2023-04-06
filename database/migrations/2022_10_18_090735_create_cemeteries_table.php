<?php

use App\Models\Cemetery\Cemetery;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cemeteries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('slug')->nullable()->index();
            $table->string('subtitle')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('schedule')->nullable();

            $table->string('address');
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();

            $table->text('description')->nullable();
            $table->string('status', 15);
            $table->string('moderators_comment')->nullable();
            $table->string('access');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('cemeteries');
        }

    }
};
