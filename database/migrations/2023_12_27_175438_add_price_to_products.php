<?php

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
<<<<<<<< HEAD:database/migrations/2023_12_24_044652_create_cart.php
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();
========
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('price')->default(0);
>>>>>>>> de0e26ecd37d7a71e45bdb13191a82922a51948e:database/migrations/2023_12_27_175438_add_price_to_products.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2023_12_24_044652_create_cart.php
        Schema::dropIfExists('cart');
========
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('price');
        });
>>>>>>>> de0e26ecd37d7a71e45bdb13191a82922a51948e:database/migrations/2023_12_27_175438_add_price_to_products.php
    }
};
