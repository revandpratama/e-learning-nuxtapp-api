<?php

namespace Database\Factories;

use App\Models\Score;
use App\Models\User;
use App\Models\Krs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // public function configure()
    // {
    //     return $this->afterCreating(function(Score $score){
    //         $score->user_id = User::inRandomOrder()->first()->id();
    //         $score->krs_id = Krs::inRandomOrder()->first()->id();
    //     });
    // }

    public function definition(): array
    {
        return [
            'user_id' => rand(1,2),
            'krs_id' => rand(1,10),
            'score' => rand(50, 100),
            'index' => 'A'
        ];
    }
}
