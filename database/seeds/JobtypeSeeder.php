<?php

use Illuminate\Database\Seeder;

class JobtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('joptypes')->insert([
            [
                'job_id'=>1,
                'name'=>'ออกแบบ'
            ]
        ]);
    }
}
