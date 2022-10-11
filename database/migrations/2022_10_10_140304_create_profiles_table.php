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
            $table->string('full_name');
            $table->string('avatar');
            $table->date('date_birth');
            $table->string('place_birth');
            $table->date('date_death');
            $table->string('burial_place');
            $table->string('death_certificate');
            $table->string('religious_views');
            $table->string('hobby');
            $table->string('image_video_gallery');
            $table->integer('id_father');
            $table->integer('id_mother');
            $table->integer('id_spouse');
            $table->boolean('moderation_status');
            $table->string('moderators_comment');
            $table->string('setting_access');
            $table->string('gender');
            $table->integer('p_id');
            $table->integer('m_id');
            $table->integer('f_id');

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
