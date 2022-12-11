<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('roles_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('roles_user');
            Schema::dropIfExists('roles');
        }
    }
};
