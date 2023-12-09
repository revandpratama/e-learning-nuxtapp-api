<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Krs;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KRS>
 */
class KRSFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    // public function configure()
    // {
    //     return $this->afterCreating(function(Krs $krs) {
    //         $krs->user_id = User::inRandomOrder()->first()->id();
    //         $krs->subject_id = Subject::inRandomOrder()->first()->id();
    //     });
    // }

    public function definition(): array
    {
        return [
            // 'user_id' => User::inRandomOrder()->first()->id(),
            // 'subject_id' => Subject::inRandomOrder()->first()->id(),
            'user_id' => rand(1, 2),
            'subject_id' => rand(1, 5),
            'lecturer' => fake()->name(),
            'semester' => rand(1, 3),
            'class' => rand(1, 10) . '-' . rand(1,5) . '-' . rand(1,9),
            'schedule' => fake()->randomElement(['Monday', 'Tuesday', 'Wednesday'])
        ];
    }
}
