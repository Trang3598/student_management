<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'class_code' => 1,
        'gender' => $faker->randomElement(['1', '2']),
        'address' => $faker->address,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->phoneNumber,
        'slug' => 'url-than-thien',
        'image' => $faker->image('public/img',100,100, null, false),
        'user_id' => factory('App\User')->create()->id,
    ];
});
