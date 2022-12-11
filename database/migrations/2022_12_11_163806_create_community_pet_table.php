<?php

use App\Models\Community\Community;
use App\Models\Profile\Pet\Pet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('community_pet', function (Blueprint $table) {
            $table->foreignIdFor(Community::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Pet::class)->constrained()->cascadeOnDelete();

            $table->primary(['pet_id', 'community_id']);
        });
    }


    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('community_pet');
        }
    }
};
