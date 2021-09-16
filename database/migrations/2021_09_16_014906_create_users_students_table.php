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
            $table->unsignedBigInteger('user_id')->unique();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->unique();


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
