<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            1 => 'admin',
            2 => 'client',
            3 => 'employer'
        ];

        foreach ($roles as $id => $role) {
            DB::table('roles')->insert([
                'id' => $id,
                'slug' => $role,
                'name' => ucfirst($role),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}