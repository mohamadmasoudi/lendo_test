<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bank_account_number'   => fake()->creditCardNumber(),
            'complete_info'         => rand(0,1),
            'mobile'                => fake()->phoneNumber(),
            'name'                  => fake()->name(),
        ];
    }

    public function normal(): Factory
    {
        return $this->state(function (array $attributes) {
           return [
                'status' => 'normal'
           ];
        });
    }
    public function blocked(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'blocked'
            ];
        });
    }
}
