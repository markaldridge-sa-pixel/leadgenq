<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FunnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->line_nr,
            'line_nr' => $this->faker->line_nr,
            'question' => $this->faker->question,
            'qty' => $this->faker->qty,
            'min_value' => $this->faker->min_value,
            'max_value' => $this->faker->max_value,
            'leadforms_id' => $this->faker->max_value,

        ];
    }
}
