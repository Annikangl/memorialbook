<?php

use App\Models\Profile\Hobby;
use App\Models\Profile\Human\Human;
use App\Models\Profile\Religion;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {


        Schema::create('humans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('mother_id')->nullable()
                ->references('id')
                ->on('humans')
                ->nullOnDelete();

            $table->foreignId('father_id')
                ->nullable()
                ->references('id')
                ->on('humans')
                ->nullOnDelete();

            $table->foreignId('spouse_id')->nullable()
                ->references('id')
                ->on('humans')
                ->nullOnDelete();

            $table->foreignId('children_id')->nullable()
                ->references('id')
                ->on('humans')
                ->nullOnDelete();

            $table->foreignIdFor(Religion::class)->nullable()->constrained()->nullOnDelete();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('slug')->nullable()->index();
            $table->text('description')->nullable();
            $table->string('gender', 10);

            $table->date('date_birth')->nullable();
            $table->date('date_death')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('burial_place')->nullable();
            $table->string('death_reason')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->json('hobbies')->nullable();
            $table->boolean('is_celebrity')->default(false);

            $table->string('status', 16);
            $table->string('moderators_comment')->nullable();
            $table->string('access')->nullable();

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('humans');
        }
    }
};
