<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'category_id'=> rand(1,10),
        'title' => $faker->word,
        'description'=>$faker->paragraph,
        'image' => $faker->imageUrl(),
        'price' => $faker->randomFloat(),
        'discount' => 0,
        'del_price' => 0,
    ];
});
