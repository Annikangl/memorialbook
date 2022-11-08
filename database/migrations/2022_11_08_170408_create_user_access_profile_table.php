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
        Schema::create('users_access_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User\User::class)
                ->constrained();
            $table->foreignIdFor(\App\Models\Profile\Profile::class)
                ->constrained();
            $table->string('status', 30);
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
        Schema::dropIfExists('user_access_profile');
    }
};
