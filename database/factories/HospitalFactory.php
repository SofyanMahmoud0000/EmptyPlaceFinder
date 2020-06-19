<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hospital;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Hospital::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'name' => $faker->company,
        'address_location' => $faker->address,
        'x_location' => $faker->randomFloat(1, 1, 100),
        'y_location' => $faker->randomFloat(1, 1, 100),
        'free_slots_high' =>  $faker->numberBetween($min = 0, $max = 200),
        'free_slots_medium' => $faker->numberBetween($min = 0, $max = 100),
        'free_slots_low' => $faker->numberBetween($min = 0, $max = 50),
        'price_high' => $faker->numberBetween($min = 1000, $max = 10000),
        'price_medium' => $faker->numberBetween($min = 500, $max = 2000),
        'price_low' => $faker->numberBetween($min = 100, $max = 1000),
    ];
});
