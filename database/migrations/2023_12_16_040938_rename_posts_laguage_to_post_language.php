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
        Schema::table('posts_laguage', function (Blueprint $table) {
            Schema::rename('post_laguage', 'post_language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts_laguage', function (Blueprint $table) {
            Schema::rename('post_laguage', 'post_language');
        });
    }
};
