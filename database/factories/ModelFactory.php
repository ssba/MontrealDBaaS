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
    static $email;

    return [
        'id' => $faker->uuid,
        'fname' => $faker->firstName,
        'lname' => $faker->lastName,
        'email' => $email ?: $faker->safeEmail,
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
$factory->define(App\CPUStat::class, function (Faker\Generator $faker) {
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
    static $database, $real;

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


    $ip = $faker->ipv4;
    $realDataByIP = GeoIP::getLocation($ip);

    return [
        'method' => $methods[array_rand($methods)],
        'type' => $types[array_rand($types)],
        'database' => $database ?: $database = function () {
            return factory(App\Database::class)->create()->id;
        },
        'ip' => $ip,
        'country' => $realDataByIP->country,
        'city' => $realDataByIP->city,
        'lat' => $realDataByIP->lat,
        'lon' => $realDataByIP->lon,
        'os' => array_rand(\RequestStats::getOS()),
        'browser' => array_rand(\RequestStats::getBrowsers()),
        'responseCode' => '200',
        'responseError' => false,
        'created_at' => $faker->dateTimeBetween('-1 month', 'now')
    ];

});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\CustomerAction::class, function (Faker\Generator $faker) {
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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\CustomerSetting::class, function (Faker\Generator $faker) {
    static $customer;

    return [
        'customer' => $customer ?: $customer = function () {
            return factory(App\Customer::class)->create()->id;
        },
        'tpl_skin' => 'skin-blue',
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\AdminSetting::class, function (Faker\Generator $faker) {
    static $admin;

    return [
        'admin' => $admin ?: $admin = function () {
            return factory(App\Admin::class)->create()->id;
        },
        'tpl_skin' => 'skin-blue',
    ];
});