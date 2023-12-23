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
        Schema::table('post_language', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->longText('content')->nullable()->change();
            $table->string('meta_title')->nullable()->change();
            $table->string('meta_keyword')->nullable()->change();
            $table->text('meta_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_language', function (Blueprint $table) {
            //
        });
    }
};
