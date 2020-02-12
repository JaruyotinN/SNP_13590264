<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id')->unsigned()->nullable();
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('img')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('uni_id')->unsigned();
            $table->foreign('uni_id')
                ->references('id')
                ->on('universities')
                ->onDelete('cascade');
            $table->bigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')
                ->references('id')
                ->on('faculties')
                ->onDelete('cascade');
            $table->bigInteger('major_id')->unsigned();
            $table->foreign('major_id')
                ->references('id')
                ->on('majors')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('student_infos', function (Blueprint $table) {
            $table->bigInteger('teacher_id')->unsigned();
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teacherinfos')
                ->onDelete('cascade');
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacherinfos');
    }
}
