<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('nsn')->unique();
            $table->enum('gender', ['male', 'female', 'not-specified']);
            $table->string('phone')->nullable();
            $table->string('ethnicity_other');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('comapny_id')->nullable()->constrained();
            $table->foreignId('classroom_id')->nullable()->constrained();

            $table->uuid('uuid')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_students');
    }
}
