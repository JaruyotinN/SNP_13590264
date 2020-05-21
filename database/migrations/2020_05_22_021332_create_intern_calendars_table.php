<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intern_calendars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->bigInteger('uni_id')->unsigned()->nullable();
            $table->foreign('uni_id')
                ->references('id')
                ->on('universities')
                ->onDelete('cascade');
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->foreign('faculty_id')
                ->references('id')
                ->on('faculties')
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
        Schema::dropIfExists('intern_calendars');
    }
}
