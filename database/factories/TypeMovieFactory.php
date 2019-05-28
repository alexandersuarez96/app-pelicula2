<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\TypeMovie;
use Faker\Generator as Faker;

$factory->define(TypeMovie::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
    ];
});
