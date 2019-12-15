<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('university_name');
            $table->timestamps();
        });
        Schema::table('student_infos', function (Blueprint $table) {
            $table->bigInteger('uni_id')->unsigned();
            $table->foreign('uni_id')
                ->references('id')
                ->on('universities')
                ->onDelete('cascade');
        });
        Schema::table('faculties', function (Blueprint $table) {
            $table->bigInteger('uni_id')->unsigned();
            $table->foreign('uni_id')
                ->references('id')
                ->on('universities')
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
        Schema::dropIfExists('universities');
    }
}
