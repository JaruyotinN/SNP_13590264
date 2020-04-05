<?php

use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            [
                'faculty_id'=>1,
                'name'=>'ออกแบบเว็บและสื่อโต้ตอบ'
            ],
            [
                'faculty_id'=>1,
                'name'=>'ออกแบบเกม'
            ],
            [
                'faculty_id'=>1,
                'name'=>'ออกแบบแอนิเมชัน'
            ],
        ]);
    }
}
