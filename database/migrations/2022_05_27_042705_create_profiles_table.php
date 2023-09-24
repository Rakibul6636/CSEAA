<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('designation')->nullable();
            $table->text('about')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            $table->string('degree')->nullable();
            $table->string('session')->nullable();
            $table->string('batch')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('workPlace')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
