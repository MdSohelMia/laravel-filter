<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'customer_id' => rand(1,10),
        'issue_date'=>now()->subDays(mt_rand(1,60))->format('Y-m-d'),
        'due_date' =>now()->addDays(mt_rand(1,90))->format('Y-m-d'),
        'total' =>$faker->numberBetween(100,10000)
    ];
});
