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
            $table->bigInteger('teacher_id');
            $table->string('std_name');
            $table->string('std_surname');
            $table->string('std_number');
            $table->string('std_address');
            $table->string('district_id');
            $table->string('province_id');
            $table->string('uni_id');
            $table->string('faculty_id');
            $table->string('major_id');
            $table->string('intern_status');
            $table->string('std_port');
            $table->string('std_cv');
            $table->string('std_sendPort');
            $table->integer('comevent_invite');
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
