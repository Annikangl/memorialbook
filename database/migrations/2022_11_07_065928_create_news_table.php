<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->references('id')->on('users');
            $table->unsignedBigInteger('profile_id')->nullable()->references('id')->on('profiles');
            $table->string('title');
            $table->text('content')->nullable();

            $table->timestamps();
        });

        Schema::create('news_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\News\News::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
