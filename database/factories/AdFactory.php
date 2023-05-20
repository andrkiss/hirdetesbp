<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ad;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    protected $model = Ad::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cim' => $this->faker->text(30),
            'szoveg' => $this->faker->text,
            'ar' => $this->faker->randomNumber(4, true),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
