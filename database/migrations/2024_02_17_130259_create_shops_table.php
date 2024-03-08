<?php

use App\Enums\ShopStatus;
use App\Models\Profile\Cemetery\Cemetery;
use App\Models\User\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Cemetery::class)
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('phone',25);
            $table->string('address');
            $table->json('shop_address_coords');
            $table->string('cemetery_address');
            $table->json('cemetery_address_coords');
            $table->text('description')->nullable();
            $table->string('status',16)->default(ShopStatus::ON_MODERATION);
            $table->boolean('has_pickup')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
