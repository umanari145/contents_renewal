<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\Item::class, function (Faker\Generator $faker) {
    static $password;

    $faker = Faker\Factory::create('ja_JP');

    return [
        'title' => $faker->name,
        'movie_url' => $faker->url,
    ];
});
