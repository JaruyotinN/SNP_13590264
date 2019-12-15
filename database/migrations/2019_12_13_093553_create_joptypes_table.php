<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoptypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joptypes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->onDelete('cascade');
            $table->string('type_name');
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
        Schema::dropIfExists('joptypes');
    }
}
