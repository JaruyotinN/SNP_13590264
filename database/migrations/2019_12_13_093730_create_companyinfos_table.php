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
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('district_id')->nullable();
            $table->string('province_id')->nullable();
            $table->string('prove')->nullable();
            $table->string('juristic')->nullable();
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
