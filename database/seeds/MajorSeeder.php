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
                'name'=>'สาขาวิชาเทคโนโลยีสารสนเทศเพื่อการออกแบบเว็บและสื่อโต้ตอบ'
            ],
            [
                'faculty_id'=>1,
                'name'=>'สาขาวิชาเทคโนโลยีสารสนเทศเพื่อการออกแบบเกม'
            ],
            [
                'faculty_id'=>1,
                'name'=>'สาขาวิชาเทคโนโลยีสารสนเทศเพื่อการออกแบบแอนิเมชัน'
            ],
            [
                'faculty_id'=>1,
                'name'=>'สาขาวิชาเทคโนโลยีดิจิทัลเพื่อธุรกิจ'
            ],
            [
                'faculty_id'=>1,
                'name'=>'สาขาวิชานิเทศศาสตร์'
            ],
        ]);
    }
}
