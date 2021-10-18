<?php

namespace Database\Factories;

use App\Models\PersonalRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonalRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'user_id' => $this->faker->randomDigit,
            'movement_id' => $this->faker->randomDigit,
            'value' => $this->faker->randomFloat(2, 0, 1),
            'date' => $this->faker->dateTime
        ];
    }
}
