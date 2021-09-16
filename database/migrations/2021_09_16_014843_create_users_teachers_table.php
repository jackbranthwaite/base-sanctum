<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_teachers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('teacher_registration_number')->nullable()->unique();
            $table->string('teacher_phone');
            $table->string('teacher_role');
            $table->string('teacher_role_other')->nullable();
            $table->string('teacher_country');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_teachers');
    }
}
