<?php

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i<10; $i++){
            DB::table('comevents')->insert([
                [    
                    'desciption'=> "บริษัท ไลค์มี จำกัดนั้นเป็นบริษัทที่มีแบร์ดหลากหลาย ทั้ง InfographicThailand , AomMoeny , ถุงเงิน Family , Future Trends",
                    'quantity' => 6,
                    'requirement'=> "Graphic Desinger",
                    'img'=> "https://i.imgur.com/q8JS4VX.png",
                    'question1'=> "Question01",
                    'question2'=> "Question02",
                    'com_id'=> 1+$i,
                    'invite'=> 5,
                ]
            ]);
        }
    
    }
}
