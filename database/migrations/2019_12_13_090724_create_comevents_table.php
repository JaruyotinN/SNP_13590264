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
            $table->string('division')->nullable();   
            $table->text('desciption')->nullable();
            $table->string('quantity')->nullable();
            $table->string('jobtime')->nullable();
            $table->boolean('havereward')->nullable();
            $table->integer('reward')->nullable();
            $table->string('formreward')->nullable();
            $table->bigInteger('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')
                ->references('id')
                ->on('company_staff')
                ->onDelete('cascade');   
            $table->string('requirement')->nullable();
            $table->string('job_id')->nullable();
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
