<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
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
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('slug')->nullable()->index();
            $table->text('description')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('avatar')->nullable();
            $table->date('date_birth');
            $table->date('date_death');
            $table->string('birth_place')->nullable();
            $table->string('burial_place')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('death_reason')->nullable();
            $table->string('death_certificate')->nullable();

            $table->string('status',16);
            $table->string('moderators_comment')->nullable();
            $table->string('access')->nullable();

            $table->unsignedBigInteger('mother_id')->nullable();
            $table->unsignedBigInteger('father_id')->nullable();
            $table->unsignedBigInteger('spouse_id')->nullable();
            $table->unsignedBigInteger('child_id')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();

            //TODO не забыть убрать nullable

            $table->foreign('mother_id')->references('id')->on('profiles')
                ->onDelete('CASCADE');
            $table->foreign('father_id')->references('id')->on('profiles')
                ->onDelete('CASCADE');
            $table->foreign('spouse_id')->references('id')->on('profiles')
                ->onDelete('CASCADE');

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        Schema::create('religion_profile', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles')
                ->onDelete('CASCADE');

            $table->bigInteger('religion_id')->unsigned();
            $table->foreign('religion_id')->references('id')->on('religions')
                ->onDelete('CASCADE');
        });

        Schema::create('hobby_profile', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles')
                ->onDelete('CASCADE');

            $table->bigInteger('hobby_id')->unsigned();
            $table->foreign('hobby_id')->references('id')->on('hobbies')
                ->onDelete('CASCADE');
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
