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
$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(1),
        'gender' => 'm'
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    static $type;

    return [
        'id' => $faker->uuid,
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'type' => in_array($type,['manager', 'superadmin']) ? $type : 'manager' ,
        'email' => $faker->safeEmail,
        'password' => bcrypt(1),
        'gender' => 'm',
        'created_at' => $faker->dateTime('now'),
        'updated_at' => $faker->dateTime('now')
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\CustomerToAdmin::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'customer' => function () {
            return factory(App\Customer::class)->create()->id;
        },
        'admin' => function () {
            return factory(App\Admin::class)->create()->id;
        }
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Database::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->uuid,
        'customer' => function () {
            return factory(App\Customer::class)->create()->id;
        },
        'charset' => 'utf8',
        'name' => $faker->word,
        'collation' => NULL,
        'options' => '',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Table::class, function (Faker\Generator $faker) {

    $types = [
        'INT',
        'VARCHAR',
        'TEXT',
        'DATE',
        'REAL',
        'BOOLEAN'
    ];

    return [
        'id' => $faker->uuid,
        'database' => function () {
            return factory(App\Database::class)->create()->id;
        },
        'name' => $faker->word,
        'type' => $types[array_rand($types)],
        'values' => '',
        'default' => '',
        'collation' => '',
        'attributes' => '',
        'NULL' => false,
        'index' => NULL,
        'ai' => NULL,
        'comments' => ''
    ];
});