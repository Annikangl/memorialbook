<?php

use App\Models\News\News;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('human_id')->nullable()->references('id')->on('humans');
            $table->string('title');
            $table->text('content')->nullable();

            $table->timestamps();
        });

    }


    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('news');
        }
    }
};
