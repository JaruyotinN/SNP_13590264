<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'title'=>'การตลาด/ประชาสัมพันธ์'
            ],
            [
                'title'=>'การจัดการทรัพยากรมนุษย์'
            ],
            [
                'title'=>'บริการการโรงแรม'
            ],
            [
                'title'=>'Logistic ซัพพลายเชน'
            ],
            [
                'title'=>'นักเขียน/Writer'
            ],
            [
                'title'=>'โฆษณา/สื่อ/Creative'
            ],
            [
                'title'=>'IT/Programmer'
            ],
            [
                'title'=>'ออกแบบ/Graphic'
            ],
        ]);
    }
}
