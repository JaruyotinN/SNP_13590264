<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComeventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comevents', function (Blueprint $table) {
            $table->bigIncrements('comevent_id');
            $table->bigInteger('type_id');
            $table->string('comevent_desciption');
            $table->integer('comevent_quantity');
            $table->string('comevent_img');
            $table->string('comevent_q1')->nullable();
            $table->string('comevent_q2')->nullable();
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
        Schema::dropIfExists('comevents');
    }
}
