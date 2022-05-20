<?php

namespace Hito\Platform\Database\Seeders;

use Hito\Platform\Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
    }
}
