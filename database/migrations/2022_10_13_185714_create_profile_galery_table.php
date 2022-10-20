<?php

use App\Models\Profile\Profile;
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
        Schema::create('profile_gallery', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Profile::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('item')->nullable();
            $table->string('item_sm')->nullable();
            $table->string('extension',4);

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
        if (app()->isLocal()) {
            Schema::dropIfExists('profile_gallery');
        }
    }
};
