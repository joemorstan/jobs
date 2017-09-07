<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Resume::class, function (Faker\Generator $faker) {

    return [
        'user_id' => \App\User::whereHas('roles', function($q) {
            $q->where('id', 2);
        })->inRandomOrder()->first()->id,
        'title' => $faker->sentence(3),
        'city_id' => random_int(1, 5),
        'salary' => random_int(1000, 5000),
        'active' => true,
        'description' => $faker->paragraph(4, true),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});

$factory->define(App\Vacancy::class, function (Faker\Generator $faker) {

    return [
        'user_id' => \App\User::whereHas('roles', function($q) {
            $q->where('id', 3);
        })->inRandomOrder()->first()->id,
        'title' => $faker->sentence(3),
        'company' => $faker->company,
        'city_id' => random_int(1, 5),
        'salary' => random_int(1000, 5000),
        'active' => true,
        'description' => $faker->paragraph(4, true),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});

$factory->define(App\City::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->city,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'email' => $faker->unique()->email,
        'password' => Hash::make('123456'),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'dob' => \Carbon\Carbon::now(),
        'city_id' => \App\City::inRandomOrder()->select('id')->first()->id,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});