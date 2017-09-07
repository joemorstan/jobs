<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ResumesSeeder::class);
        $this->call(VacanciesSeeder::class);
    }
}
