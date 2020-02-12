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
            $table->text('desciption');
            $table->integer('quantity');
            $table->string('requirement');
            $table->string('img')->nullable();
            $table->string('question1')->nullable();
            $table->string('question2')->nullable();
            $table->integer('invite')->default(5);
            $table->string('enddate')->nullable();
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
