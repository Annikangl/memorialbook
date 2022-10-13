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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('patronymic');
            $table->string('surname');
            $table->string('avatar');
            $table->date('date_birth');
            $table->string('place_birth');
            $table->date('date_death');
            $table->string('burial_place')->nullable();
            $table->string('reason_death')->nullable();
            $table->string('death_certificate')->nullable();
            $table->string('religious_views')->nullable();
            $table->string('hobby')->nullable();
            $table->string('image_video_gallery')->nullable();
            $table->integer('id_father')->nullable();
            $table->integer('id_mother')->nullable();
            $table->integer('id_spouse')->nullable();
            $table->boolean('moderation_status')->nullable();
            $table->string('moderators_comment')->nullable();
            $table->string('setting_access')->nullable();
            $table->string('gender')->nullable();
            $table->integer('p_id')->nullable();
            $table->integer('m_id')->nullable();
            $table->integer('f_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
