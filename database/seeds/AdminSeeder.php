<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => Carbon::now(),
            'city_id' => random_int(1,5),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $user = Sentinel::findById(1);
        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);

        DB::table('role_users')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
