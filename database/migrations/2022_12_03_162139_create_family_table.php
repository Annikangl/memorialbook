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
        Schema::create('family_burials', function (Blueprint $table) {
            $table->id();
            $table->string('banner');
            $table->timestamps();
        });

        Schema::table('humans', function (Blueprint $table) {
           $table->foreignId('family_burial_id')->after('religion_id')->nullable()
               ->references('id')->on('family_burials')->cascadeOnDelete();
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
            Schema::table('humans', function (Blueprint $table) {
               $table->dropForeign('humans_family_burial_id_foreign');
            });
            Schema::dropIfExists('family_burials');
        }

    }
};
