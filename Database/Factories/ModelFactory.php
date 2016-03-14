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
use Illuminate\Support\Str;

$factory->define(\Modules\Page\Entities\Page::class, function (Faker\Generator $faker) {
    return [
        'title' => $title = ucfirst($faker->sentence(3, $variableNbWords = true)),
        'slug'  => Str::slug($title),
        'body'  => implode(' ', array_map(function ($value) {
            return "<p>{$value}</p>";
        }, $faker->paragraphs(15, false))),

        'published'  => $faker->boolean(80),
        'user_id'    => $faker->randomElement(\Modules\User\Entities\Entrust\EloquentUser::all()->lists('id')->toArray()),
        'created_at' => $start = $faker->dateTimeThisYear,
        'updated_at' => $faker->dateTimeBetween($start),
    ];
});