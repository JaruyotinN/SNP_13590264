<?php

use Illuminate\Database\Seeder;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
            [
                'name'=>'คณะเทคโนโลยีสารสนเทศและการสื่อสาร',
                'uni_id'=>1,
            ]
        ]);
    }
}
