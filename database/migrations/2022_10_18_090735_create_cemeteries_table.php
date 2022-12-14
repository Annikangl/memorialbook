<?php

use App\Models\Cemetery\Cemetery;
use App\Models\User\User;
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
        Schema::create('cemeteries', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained();

            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('slug')->nullable()->index();
            $table->string('subtitle')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',20)->nullable();
            $table->string('schedule')->nullable();
            $table->string('address');

            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('avatar')->nullable();
            $table->string('banner')->nullable();
            $table->text('description')->nullable();
            $table->string('status', 15);
            $table->string('moderators_comment')->nullable();
            $table->string('access');

            $table->timestamps();
        });

        Schema::create('cemetery_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cemetery::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('item');
        });

        Schema::create('cemetery_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cemetery::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('file');
        });

        Schema::create('cemetery_socials', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cemetery::class)
                ->constrained();

            $table->string('link')->nullable();
            $table->string('icon')->nullable();
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
            Schema::dropIfExists('cemetery_socials');
            Schema::dropIfExists('cemetery_galleries');
            Schema::dropIfExists('cemetery_documents');
            Schema::dropIfExists('cemeteries');
        }

    }
};
