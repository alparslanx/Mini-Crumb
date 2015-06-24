<?php

use Carbon\Carbon;

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

$factory->define(App\Models\Topic::class, function ($faker) {
    return [
        'sef' => $faker->word,
        'title' => $faker->sentence,
        'user_id' => 1,
        'status' => 3
    ];
});

$factory->define(App\Models\Entry::class, function ($faker) {
    return [
        'topic_id' => 1,
        'content' => $faker->text,
        'user_id' => 1,
        'status' => 3
    ];
});