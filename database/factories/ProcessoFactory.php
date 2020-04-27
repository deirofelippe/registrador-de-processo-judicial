<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Processo;
use Faker\Generator as Faker;

$factory->define(Processo::class, function (Faker $faker) {
    return [
        'numeroProcesso' => $faker->unique()->phoneNumber,
        'autor' => $faker->name,
        'vara' => $faker->title
    ];
});
