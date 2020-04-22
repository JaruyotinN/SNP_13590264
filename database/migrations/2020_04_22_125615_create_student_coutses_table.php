<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCoutsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_coutses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->bigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')
                ->references('id')
                ->on('faculties')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('student_infos', function (Blueprint $table) {
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->foreign('course_id')
            ->references('id')
            ->on('student_coutses')
            ->onDelete('cascade');
        });  
        Schema::table('comevent_joins', function (Blueprint $table) {
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->foreign('course_id')
            ->references('id')
            ->on('student_coutses')
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
        Schema::dropIfExists('student_coutses');
    }
}
