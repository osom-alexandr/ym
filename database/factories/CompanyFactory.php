<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.php artisan migrate:fresh --seed
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'phone' => fake()->e164PhoneNumber(),
            'description' => fake()->text(),
        ];
    }
}
