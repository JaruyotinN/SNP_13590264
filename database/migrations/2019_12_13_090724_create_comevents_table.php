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
            $table->bigIncrements('id');
            $table->string('comevent_desciption');
            $table->integer('comevent_quantity');
            $table->string('comevent_img');
            $table->string('comevent_q1')->nullable();
            $table->string('comevent_q2')->nullable();
            $table->integer('comevent_invite');
            $table->timestamps();
        });
        Schema::table('comevent_joins', function (Blueprint $table) {
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')
                ->on('comevents')
                ->onDelete('cascade');
        });       
        Schema::table('company_staff', function (Blueprint $table) {
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')
                ->on('comevents')
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
        Schema::dropIfExists('comevents');
    }
}
