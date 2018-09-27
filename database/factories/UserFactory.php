<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)),
        'date_of_birth'=> $faker->dateTimeBetween('1920-01-01', '2018-12-31')->format('Y/m/d'),
        'gender'=> $faker->randomElement(['Male', 'Female']),
        'type' => $faker->randomElement(['admin', 'user']),
        'remember_token' => str_random(10),
    ];
});
