<?php

use Illuminate\Database\Seeder;

class Internstatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('internstatuses')->insert([
            [
                'title'=>'เด็กฝึกงาน'
            ]
        ]);
    }
}
