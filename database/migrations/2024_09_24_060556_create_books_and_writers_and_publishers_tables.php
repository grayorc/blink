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

        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo_path');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('writers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('photo_path');
            $table->timestamps();
        });
        
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('title');
            $table->string('photo_path');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('writer_book', function (Blueprint $table) {
            $table->unsignedBigInteger('writer_id');
            $table->unsignedBigInteger('book_id');
            $table->foreign('writer_id')->references('id')->on('writers')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->primary(['writer_id','book_id']);
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writer_book');
        Schema::dropIfExists('writers');
        Schema::dropIfExists('books');
        Schema::dropIfExists('publishers');
    }
};
