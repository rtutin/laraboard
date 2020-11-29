<?php

namespace Database\Factories;

use App\Models\Board;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Board::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'route' => $this->faker->unique()->randomLetter,
            'owner_id' => 1,
            'name' => $this->faker->word,
            'bump_limit' => env('DEFAULT_BUMPLIMIT'),
            'thread_limit' => env('DEFAULT_THREADLIMIT'),
            'hidden' => false,
            'description' => $this->faker->word,
            'post_count' => 0,
        ];
    }
}
