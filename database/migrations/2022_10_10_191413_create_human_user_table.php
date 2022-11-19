<?php

use App\Models\Profile\Human\Human;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('human_user', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Human::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('human_user');
        }
    }
};
