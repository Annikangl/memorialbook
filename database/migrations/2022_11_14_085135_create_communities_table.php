<?php

use App\Models\Community\Community;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Pet\Pet;
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
            $table->string('address');
            $table->boolean('is_celebrity')->default(false);
            $table->timestamps();
        });

        Schema::create('community_users', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Community::class)->constrained();
            $table->timestamps();
            $table->primary(['user_id', 'community_id']);
        });

        Schema::create('community_profiles', function (Blueprint $table) {
            $table->foreignIdFor(Community::class)->constrained()->cascadeOnDelete();
            $table->morphs('profileable');
        });


        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('author_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();

            $table->foreignIdFor(Community::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description');
            $table->boolean('is_pinned')->default(0);
            $table->integer('reposts')->default(0);

            $table->timestamp('published_at')->nullable();
            $table->timestamps();

        });
    }

    public function down(): void
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('community_post_tags');
            Schema::dropIfExists('community_posts');
            Schema::dropIfExists('community_user');
            Schema::dropIfExists('community_human');
            Schema::dropIfExists('community_profiles');
            Schema::dropIfExists('communities');
        }

    }
};
