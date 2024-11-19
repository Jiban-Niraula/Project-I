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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keyword');
            $table->tinyInteger('navbar_status')->default('0');
            $table->tinyInteger('status')->default('0');
            $table->boolean('is_deleted')->default('0');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Reference to users table
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
