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
        factory(App\Admin::class, 1)->create([
            'type' => 'superadmin',
        ]);

        factory(App\Customer::class, 5)->create();

        $customer = factory(App\Customer::class)->create();

        $database = factory(App\Database::class)->create([
            'customer' => $customer->id,
        ]);

        factory(App\CPUStats::class, 36)->create();
        factory(App\RequestStats::class, 500)->create([
            'database' => $database->id,
        ]);

        factory(App\CustomerActions::class, 50)->create([
            'customer' => $customer->id,
        ]);

    }
}
