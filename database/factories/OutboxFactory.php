<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Outbox>
 */
class OutboxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone_id' => 1,
            'destination_number' => "085706756919",
            'text' => $this->faker->realText($maxNbChars = 150, $indexSize = 2),
            'status' => "new"
        ];
    }
}
