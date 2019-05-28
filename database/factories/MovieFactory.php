<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'type_movies_id'=>App\Models\TypeMovie::all()->random()->id,
    ];
});
