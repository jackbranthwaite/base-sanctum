<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolClassAndCompanyToUsersStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_students', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('set null');
            $table->foreign('class_id')
                ->references('id')
                ->on('classes')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_students', function (Blueprint $table) {
            //
        });
    }
}
