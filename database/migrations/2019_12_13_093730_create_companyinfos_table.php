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
            $table->string('com_name')->nullable();
            $table->string('com_address')->nullable();
            $table->string('district_id')->nullable();
            $table->string('province_id')->nullable();
            $table->string('com_prove')->nullable();
            $table->string('com_juristic')->nullable();
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
        Schema::dropIfExists('companyinfos');
    }
}
