<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClonedWebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_name' => 'https://cloned.com',
            'status' => rand(0, 1),
        ];
    }
}
