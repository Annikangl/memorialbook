<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('community_text_posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('community_text_posts');
    }
};
