<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($u) {
            $activation = Activation::create($u);
            Activation::complete($u, $activation->code);

            $role = Sentinel::findRoleById(random_int(2, 3));
            $role->users()->attach($u);
        });
    }
}
