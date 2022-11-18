<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('religions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable()->index();
        });

        Schema::create('hobbies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable()->index();
        });


        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->foreignId('mother_id')->nullable()
                ->references('id')
                ->on('profiles')
                ->nullOnDelete();

            $table->foreignId('father_id')
                ->nullable()
                ->references('id')
                ->on('profiles')
                ->nullOnDelete();

            $table->foreignId('spouse_id')->nullable()
                ->references('id')
                ->on('profiles')
                ->nullOnDelete();

            $table->foreignId('child_id')->nullable()
                ->references('id')
                ->on('profiles')
                ->nullOnDelete();

            $table->foreignId('religion_id')->nullable()
                ->references('id')
                ->on('religions')
                ->nullOnDelete();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('patronymic')->nullable();
            $table->string('slug')->nullable()->index();
            $table->text('description')->nullable();
            $table->string('gender', 10);
            $table->string('avatar')->nullable();
            $table->date('date_birth');
            $table->date('date_death');
            $table->string('birth_place')->nullable();
            $table->string('burial_place')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('death_reason')->nullable();
            $table->string('death_certificate')->nullable();
            $table->string('religious_id')->nullable();

            $table->string('status', 16)->nullable();
            $table->string('moderators_comment')->nullable();
            $table->string('access')->nullable();

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });


        Schema::create('hobby_profile', function (Blueprint $table) {
            $table->id();

            $table->foreignId('profile_id')
                ->references('id')
                ->on('profiles')
                ->cascadeOnDelete();

            $table->foreignId('hobby_id')
                ->references('id')
                ->on('hobbies')
                ->cascadeOnDelete();
        });
    }

    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('religions');
            Schema::dropIfExists('hobbies');
            Schema::dropIfExists('profiles');
            Schema::dropIfExists('religion_profile');
            Schema::dropIfExists('hobby_profile');
        }
    }
};
