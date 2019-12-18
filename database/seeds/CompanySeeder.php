<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i<10; $i++){

        DB::table('companyinfos')->insert([
            [
                'name'=>'ไลค์มี จำกัดx '. $i,
                'address'=>'126/5 อาคาร ไทยศรี ชั้น2 ถนนกรุงธนบุรี แขวงบางลำภูล่าง เขตคลองสาน กรุงเทพมหานคร 10600',
                'district_id'=>1,
                'province_id'=>1,
                'prove'=>"none",
                'juristic'=>"none",
            ]
        ]);
            }
    }
}
