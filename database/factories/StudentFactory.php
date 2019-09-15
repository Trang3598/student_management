<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
$users = \App\ClassModel::select("id")->get();
$factory->define(\App\StudentModel::class, function (Faker $faker) use ($users) {
    return [
        //
        'name' => $faker->name,
        'class_code' => $users->shuffle()->first()->id,
        'gender' => rand(1, 3),
        'birthday' => \Carbon\Carbon::now(),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'image' => $faker->image('public/images',400,300, null, false)
    ];
});
