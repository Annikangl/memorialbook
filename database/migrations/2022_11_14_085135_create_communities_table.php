<?php

use App\Models\Community\Community;
use App\Models\Profile\Profile;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->string('slug')->nullable()->index();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->string('banner')->nullable();
            $table->string('avatar')->nullable();

            $table->timestamps();
        });

        Schema::create('community_user', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Community::class)->constrained();
            $table->primary(['user_id','community_id']);
        });

        Schema::create('community_profile', function (Blueprint $table) {
            $table->foreignIdFor(Profile::class)->constrained();
            $table->foreignIdFor(Community::class)->constrained();
            $table->primary(['profile_id','community_id']);
        });

        Schema::create('community_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Community::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->string('item');
            $table->string('extension');
        });

        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')
                ->references('id')->on('users')->onDelete('cascade');
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
                ->references('id')->on('community_posts')->onDelete('cascade');
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
                ->references('id')->on('community_posts')->onDelete('cascade');
            $table->foreignId('tag_id')
                ->references('id')->on('community_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('community_users');
            Schema::dropIfExists('community_galleries');
            Schema::dropIfExists('community_post_galleries');
            Schema::dropIfExists('community_post_tags');
            Schema::dropIfExists('community_tags');
            Schema::dropIfExists('community_posts');
            Schema::dropIfExists('communities');
        }

    }
};
