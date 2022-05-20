<?php

namespace Hito\Platform\Database\Seeders;

use Hito\Platform\Database\Factories\UserFactory;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            UserFactory::new()->create([
                'email' => 'admin-hito-software@grr.la',
                'is_super_admin' => true
            ]);
        } catch (QueryException) {
            // Ignore duplicate
        }

        UserFactory::new()->count(10)->create();
    }
}
