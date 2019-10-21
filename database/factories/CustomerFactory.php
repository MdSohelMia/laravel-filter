<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email'=>$faker->safeEmail,
        'company' => $faker->company,
        'group' => $faker->randomElement(['retailers','wholeseller']),
        'total_revenue' => $faker->numberBetween(1000,10009)
    ];
});
