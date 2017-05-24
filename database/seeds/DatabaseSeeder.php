<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Customer::class, 5)->create();

        factory(App\Admin::class, 1)->create([
            'type' => 'superadmin',
        ]);

        $customer = factory(App\Customer::class)->create([
            'email' => 'gilberto95@example.net'
        ]);

        $database = factory(App\Database::class)->create([
            'customer' => $customer->id,
        ]);

        factory(App\CPUStats::class, 36)->create();
        factory(App\RequestStats::class, rand(500, 700))->create([
            'database' => $database->id,
        ]);

        factory(App\CustomerActions::class, rand(50,110))->create([
            'customer' => $customer->id,
        ]);

    }
}
