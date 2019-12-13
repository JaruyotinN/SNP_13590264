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
            $table->bigIncrements('teacher_id');
            $table->string('teacher_name');
            $table->string('teacher_surname');
            $table->string('uni_id');
            $table->string('faculty_id');
            $table->string('major_id');
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
        Schema::dropIfExists('teacherinfos');
    }
}
