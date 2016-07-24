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

$factory->define(LTP\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(LTP\SocialAccount::class, function(Faker\Generator $faker) {
    return [
        'type' => 'github',
        'user_id' => factory(LTP\User::class)->create()->id,
        'username' => $faker->userName,
        'name' => $faker->name,
        'identifier' => str_random(10),
        'email' => $faker->email,
        'avatar' => "https://s3.amazonaws.com/uifaces/faces/twitter/mbilderbach/128.jpg"
    ];
});

$factory->define(LTP\Project::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words(5, true),
        'description' => $faker->paragraphs(7, true),
        'creator' => factory(LTP\User::class)->create()->id
    ];
});