<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Faculty;
use Faker\Generator as Faker;

$factory->define(Faculty::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
