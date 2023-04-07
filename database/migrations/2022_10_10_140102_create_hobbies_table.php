<?php

use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('hobbies', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable()->index();
            $table->string('title');
        });
    }

    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('hobbies');
        }
    }
};
