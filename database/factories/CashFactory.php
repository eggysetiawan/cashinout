<?php

namespace Database\Factories;

use App\Models\Cash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CashFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cash::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 2),
            'name' => $this->faker->word,
            'slug' => Str::slug($this->faker->word . Str::random(6)),
            'amount' => rand(-30000, 1000000),
            'when' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'description' => $this->faker->sentence(50),
        ];
    }
}
