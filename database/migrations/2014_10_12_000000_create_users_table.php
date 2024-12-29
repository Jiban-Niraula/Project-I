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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->string('phone')->nullable();  // Added phone number column
            $table->date('dob')->nullable();      // Made date of birth column nullable
            $table->integer('status')->default(0);
=======
            $table->string('phone');  // Added phone number column
            $table->date('dob');      // Added date of birth column
            $table->boolean('is_deleted')->default(false);
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
            $table->integer('role_as')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
