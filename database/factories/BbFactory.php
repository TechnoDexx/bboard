<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Bb;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint as SchemaBlueprint;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bb>
 */
class BbFactory extends Factory
{
    protected $model = Bb::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->text,
            'price' => $this->faker->unique()->biasedNumberBetween(1, 100000000),
            'user_id' => User::all()->random()->id,
        ];
    }
}
