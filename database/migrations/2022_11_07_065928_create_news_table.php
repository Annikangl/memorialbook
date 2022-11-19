<?php

use App\Models\News\News;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->references('id')->on('users');
            $table->foreignId('human_id')->nullable()->references('id')->on('humans');
            $table->string('title');
            $table->text('content')->nullable();

            $table->timestamps();
        });

        Schema::create('news_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(News::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('item');
            $table->string('item_sm')->nullable();
        });
    }


    public function down(): void
    {
        if (!app()->isProduction()) {
            Schema::dropIfExists('news_galleries');
            Schema::dropIfExists('news');
        }
    }
};
