<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('teacher_id')->unsigned();
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teacherinfos')
                ->onDelete('cascade');
            $table->string('std_name')->nullable();
            $table->string('std_surname')->nullable();
            $table->string('std_number')->nullable();
            $table->string('std_address')->nullable();
            $table->string('district_id')->nullable();
            $table->string('province_id')->nullable();
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
            $table->bigInteger('intern_id')->unsigned();
            $table->foreign('intern_id')
                ->references('id')
                ->on('internstatuses')
                ->onDelete('cascade');
            $table->string('std_port')->nullable();
            $table->string('std_cv')->nullable();
            $table->string('std_sendPort')->nullable();
            $table->integer('comevent_invite')->nullable();
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
        Schema::dropIfExists('student_infos');
    }
}
