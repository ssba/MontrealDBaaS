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

        factory(App\CustomerSetting::class)->create([
            'customer' => $customer->id,
        ]);

        $database = factory(App\Database::class)->create([
            'customer' => $customer->id,
        ]);

        factory(App\CPUStat::class, 36)->create();

        factory(App\RequestStats::class, rand(10, 15))->create([
            'database' => $database->id,
        ]);

        factory(App\CustomerAction::class, rand(5,20))->create([
            'customer' => $customer->id,
        ]);

        factory(App\Table::class)->create([
            'database' => $database->id,
        ]);
    }
}
