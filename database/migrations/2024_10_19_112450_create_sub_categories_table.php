<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Unique slug for the subcategory
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Reference to users table
            $table->boolean('navbar_status')->default(false);
            $table->boolean('status')->default(true);
            $table->boolean('is_deleted')->default(false); // Soft delete flag
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
