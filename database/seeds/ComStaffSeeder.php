<?php

use Illuminate\Database\Seeder;

class ComStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0 ; $i<10; $i++){

        DB::table('company_staff')->insert([
            [    
                'name'=>'Sname',
                'surname'=>'Ssurname',
                'division'=>'Future Trends'. $i,
                'career'=>'Designer',
                'email'=>'Saff@gmail.com',
                'phonenumber'=>'097-xxx-xxxx',
                'event_id'=>1+$i,
                'com_id'=>1+$i,
            ]
        ]);
    }
}
}
