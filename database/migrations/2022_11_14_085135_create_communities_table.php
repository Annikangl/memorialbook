<?php

use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();

            $table->string('slug')->nullable()->index();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('banner')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address');
            $table->double('latitude');
            $table->double('longitude');

            $table->timestamps();
        });

        Schema::create('community_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Community::class)->constrained();
            $table->primary(['user_id', 'community_id']);
        });

        Schema::create('community_human', function (Blueprint $table) {
            $table->foreignIdFor(Human::class)->constrained();
            $table->foreignIdFor(Community::class)->constrained();
            $table->primary(['human_id', 'community_id']);
        });

        Schema::create('community_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Community::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('item');
            $table->string('extension');
        });

        Schema::create('community_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Community::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('item');
        });

        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();
            $table->foreignIdFor(Community::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('pinned')->default(0);
            $table->integer('reposts')->default(0);

            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });

        Schema::create('community_post_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                ->references('id')->on('community_posts')
                ->cascadeOnDelete();

            $table->string('item');
            $table->string('extension');
        });


        Schema::create('community_tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag');
        });

        Schema::create('community_post_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                ->references('id')->on('community_posts')
                ->cascadeOnDelete();

            $table->foreignId('tag_id')
                ->references('id')->on('community_tags')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('community_users');
            Schema::dropIfExists('community_galleries');
            Schema::dropIfExists('community_post_galleries');
            Schema::dropIfExists('community_humans');
            Schema::dropIfExists('community_post_tags');
            Schema::dropIfExists('community_tags');
            Schema::dropIfExists('community_posts');
            Schema::dropIfExists('communities');
        }

    }
};
