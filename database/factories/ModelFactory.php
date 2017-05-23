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
        'gender' => 'm'
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
    static $customer;

    return [
        'id' => $faker->uuid,
        'customer' => $customer ?: $customer = function () {
            return factory(App\Customer::class)->create()->id;
        },
        'name' => $faker->word,
        'charset' => 'utf8',
        'collation' => NULL,
        'options' => NULL,
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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\CPUStats::class, function (Faker\Generator $faker) {
    static $loading;

    switch ($loading){

        case "low" :
            $s = 0;
            $e = 25;
            break;
        case "medium" :
            $s = 40;
            $e = 65;
            break;
        case "high" :
            $s = 75;
            $e = 100;
            break;
        default:
            $s = 0;
            $e = 100;
            break;

    }

    return [
        'percentage' => $faker->biasedNumberBetween($s, $e),
        'created_at' => $faker->dateTimeBetween('-1 hour', '+1 hour'),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\RequestStats::class, function (Faker\Generator $faker) {
    static $database;

    $methods = [
        'get',
        'post',
        'put',
        'delete'
    ];

    $types = [
        'rest',
        'graph'
    ];

    $device = [
        'Apple' => [
            'iPad',
            'iPhone',
            'Macbook'
        ],

        'Microsoft' => [
            'Surface',
            'PC'
        ]
    ];

    $family = array_rand($device);

    return [
        'method' => $methods[array_rand($methods)],
        'type' => $types[array_rand($types)],
        'database' => $database ?: $database = function () {
            return factory(App\Database::class)->create()->id;
        },
        'ip' => $faker->ipv4,
        'country' => $faker->country,
        'deviceFamily' => $family,
        'deviceModel' => $device[$family][array_rand( $device[$family] )],
        'responseCode' => '200',
        'responseError' => false
    ];

});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\CustomerActions::class, function (Faker\Generator $faker) {
    static $customer, $database, $table;

    $types = [ 'edit' , 'update' ,'delete' ];

    return [

        'type' => $types[array_rand($types)],
        'customer' => $customer ?: $customer = function () {
            return factory(App\Customer::class)->create()->id;
        },
        'database' => $database,
        'table' => $table,
        'description' => $faker->text(100)

    ];

});