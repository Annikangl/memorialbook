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

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->foreignId('role_id')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete();
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
