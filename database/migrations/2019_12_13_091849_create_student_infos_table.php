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
            $table->bigInteger('profile_id')->unsigned()->nullable();
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('number')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('img')->nullable();
            $table->string('address')->nullable();
            $table->string('port')->nullable();
            $table->string('cv')->nullable();
            $table->string('url_port')->nullable();
            $table->integer('sendinvite')->nullable();
            $table->timestamps();
        });
        Schema::table('comevent_joins', function (Blueprint $table) {
            $table->bigInteger('stu_id')->unsigned()->nullable();
            $table->foreign('stu_id')
            ->references('id')
            ->on('student_infos')
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
        Schema::dropIfExists('student_infos');
    }
}
