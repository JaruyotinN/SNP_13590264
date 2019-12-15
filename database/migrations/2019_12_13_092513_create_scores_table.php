<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stu_id');
            $table->foreign('stu_id')
                ->references('id')
                ->on('student_infos')
                ->onDelete('cascade');
            $table->bigInteger('type_id');
            $table->foreign('type_id')
                ->references('id')
                ->on('joptypes')
                ->onDelete('cascade');
            $table->integer('score');
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
        Schema::dropIfExists('scores');
    }
}
