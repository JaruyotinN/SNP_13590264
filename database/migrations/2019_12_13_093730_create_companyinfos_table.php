<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('companyinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('profile_id')->unsigned()->nullable();
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('phonenumber')->nullable();
            $table->string('address')->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('amphure_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('company_staff', function (Blueprint $table) {
            $table->bigInteger('com_id')->unsigned();
            $table->foreign('com_id')
                ->references('id')
                ->on('companyinfos')
                ->onDelete('cascade');
        });  
        Schema::table('comevents', function (Blueprint $table) {
            $table->bigInteger('com_id')->unsigned()->nullable();
            $table->foreign('com_id')
                ->references('id')
                ->on('companyinfos')
                ->onDelete('cascade');
        });  
        Schema::table('comevent_joins', function (Blueprint $table) {
            $table->bigInteger('com_id')->unsigned()->nullable();
            $table->foreign('com_id')
                ->references('id')
                ->on('companyinfos')
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
        Schema::dropIfExists('companyinfos');
    }
}
