<?php

namespace Hito\Platform\Database\Seeders;

use Faker\Factory;
use Hito\Platform\Models\Country;
use Hito\Platform\Services\LocationService;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $locationService = app(LocationService::class);
        $faker = Factory::create();

        $total = random_int(1, 5);
        $countries = Country::all();
        for ($i = 0; $i < $total; $i++) {
            $locationService->create(
                $faker->city,
                $countries->random()->id,
                $faker->address,
                random_int(0, 1) ? $faker->words(random_int(10, 20), true) : null
            );
        }
    }
}
