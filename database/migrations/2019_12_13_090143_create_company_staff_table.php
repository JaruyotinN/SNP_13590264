<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('com_id')->unsigned();
            $table->foreign('com_id')
                ->references('id')
                ->on('companyinfos')
                ->onDelete('cascade');
           $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')
                ->on('comevents')
                ->onDelete('cascade');
            $table->string('staff_name');
            $table->string('staff_surname');
            $table->string('staff_career');
            $table->string('staff_email');
            $table->string('staff_phonenumber');
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
        Schema::dropIfExists('company_staff');
    }
}
