<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mission;
use Faker\Generator as Faker;

if (!function_exists('makeDescription')) {
    function makeDescription(Faker $faker)
    {
        $description = '';
        for ($i = 0; $i <= $faker->numberBetween(3, 7); $i++) {
            $sentence = $faker->paragraph;
            $description .= "<p>$sentence</p>";
        }
        return $description;
    }
}

$factory->define(Mission::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'date' => $faker->date('Y-m-d H:i:s', '+1 year'),
        'description' => makeDescription($faker)
    ];
});
