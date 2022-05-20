<?php

namespace Hito\Platform\Database\Factories;

use Hito\Platform\Models\Timezone;
use Hito\Platform\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Hito\Platform\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->username() . '-hito-software@grr.la',
            'email_verified_at' => now(),
            'password' => '123456',
            'timezone_id' => Timezone::all()->random(),
            'remember_token' => Str::random(10),
        ];
    }
}
