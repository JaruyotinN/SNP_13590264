<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('knowledge01')->nullable();
            $table->integer('knowledge02')->nullable();
            $table->integer('knowledge03')->nullable();
            $table->integer('knowledge04')->nullable();
            $table->integer('entrust01')->nullable();
            $table->integer('entrust02')->nullable();
            $table->integer('entrust03')->nullable();
            $table->integer('personality01')->nullable();
            $table->integer('personality02')->nullable();
            $table->integer('personality03')->nullable();
            $table->text('cmknowledge')->nullable();
            $table->text('cmentrust')->nullable();
            $table->text('cmpersonality')->nullable();
            $table->text('reviews_note')->nullable();
            $table->bigInteger('stu_id')->unsigned()->nullable();
            $table->foreign('stu_id')
            ->references('id')
            ->on('student_infos')
            ->onDelete('cascade');
            $table->bigInteger('comevent_joins_id')->unsigned()->nullable();
            $table->foreign('comevent_joins_id')
            ->references('id')
            ->on('comevent_joins')
            ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('comevent_joins', function (Blueprint $table) {
            $table->bigInteger('sturev01_id')->unsigned()->nullable();
            $table->foreign('sturev01_id')
            ->references('id')
            ->on('student_reviews')
            ->onDelete('cascade');
            $table->bigInteger('sturev02_id')->unsigned()->nullable();
            $table->foreign('sturev02_id')
            ->references('id')
            ->on('student_reviews')
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
        Schema::dropIfExists('student_reviews');
    }
}
