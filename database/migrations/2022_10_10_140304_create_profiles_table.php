<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('slug');
            $table->string('gender', 10)->nullable();
            $table->string('avatar')->nullable();
            $table->date('date_birth');
            $table->date('date_death');
            $table->string('birth_place')->nullable();
            $table->string('burial_place')->nullable();
            $table->string('reason_death')->nullable();
            $table->string('death_certificate')->nullable();
            $table->string('religious_views')->nullable();
            $table->string('hobby')->nullable();

            $table->string('status',16);
            $table->string('moderators_comment')->nullable();
            $table->string('access')->nullable();
            $table->integer('p_id')->nullable();
            $table->integer('m_id')->nullable();
            $table->integer('f_id')->nullable();

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('profiles');
        }
    }
};
