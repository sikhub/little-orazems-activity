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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Activities::class, function (Faker\Generator $faker) {
    $name = $faker->sentence;

    return [
        'name' => $name,
        'slug' => str_slug($name),
    ];
});

$factory->define(App\Schedules::class, function (Faker\Generator $faker) {
    return [
        'activity_start' => $faker->dateTimeBetween('now', \Carbon\Carbon::parse("+1 year")),
        'activity_id' => function() {
            return factory(App\Activities::class)->create()->id;
        }
    ];
});
