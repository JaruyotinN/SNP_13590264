<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            UniversitySeeder::class,
            FacultiesSeeder::class,
            Internstatus::class,
            JobSeeder::class,
            JobtypeSeeder::class,
            MajorSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            CompanySeeder::class,
            EventSeeder::class,
            ComStaffSeeder::class,
        ]);
    }
}
