<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComeventJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comevent_joins', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('user_id')->unsigned()->default(1);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');  
            $table->text('question1')->nullable();
            $table->text('question2')->nullable();
            $table->boolean('check')->default(0);
            $table->boolean('interview')->default(0);
            $table->integer('result')->default(0)->comment('0.wait 1.interview 2.consider 3.pass 99.notpass');
            $table->integer('stu_confirm')->default(0)->comment('0.wait 1.yes 2.no');
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
        Schema::dropIfExists('comevent_joins');
    }
}
