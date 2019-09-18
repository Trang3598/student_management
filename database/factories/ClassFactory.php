<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use \App\Models\Faculty;
use App\Models\ClassModel;
use Faker\Generator as Faker;
$faculty_id = Faculty::select("id")->get();
$factory->define(ClassModel::class, function (Faker $faker) use ($faculty_id) {
    return [
        'name' => $faker->name,
        'faculty_id' => 1,
    ];
});
