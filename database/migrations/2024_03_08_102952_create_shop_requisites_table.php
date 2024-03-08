<?php

use App\Models\Shop\Shop;
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
        Schema::create('shop_requisites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Shop::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('full_name');
            $table->string('legal_address');
            $table->string('post_address');
            $table->string('INN')->nullable();
            $table->string('OGRN')->nullable();
            $table->string('KPP')->nullable();
            $table->string('BIK', 11)->nullable();
            $table->string('payment_account',34)->nullable();
            $table->string('correspondent_account',34)->nullable();
            $table->string('bank_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_requisites');
    }
};
