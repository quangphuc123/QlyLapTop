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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_catalogue_id');
            $table->string('image')->nullable();
            $table->string('SKU');
            $table->text('description')->nullable();
            $table->text('detail')->default();
            $table->tinyInteger('publish')->default(1);
            $table->bigInteger('price')->default(0);
            $table->string('brand');
            $table->text('album')->default();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('product_catalogue_id')->references('id')->on('product_catalogues')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
