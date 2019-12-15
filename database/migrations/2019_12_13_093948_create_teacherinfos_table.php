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
            $table->string('teacher_name')->nullable();
            $table->string('teacher_surname')->nullable();
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
