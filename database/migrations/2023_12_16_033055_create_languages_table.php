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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('canonical',10)->unique();
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('deleted_at')->nullable();
            $table->tinyInteger('publish')->default(1);
            $table->tinyInteger('current')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //ngôn ngữ do 1 user tạo nếu xóa ngôn ngữ đó tất cả bài viết liên quan đến ngôn ngữ đó đều bị xóa
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
