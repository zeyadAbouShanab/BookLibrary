<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reader_id'     => $this->faker->numberBetween($min = 3, $max = 4),
            'book_id' => $this->faker->numberBetween($min = 1, $max = 74),
            'status'    => $this->faker->randomElement(['PENDING', 'ACCEPTED', 'REJECTED', 'RETURNED']),
            'request_processed_at'    => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'request_managed_by'    => $this->faker->numberBetween($min =1 , $max = 2),
            'deadline'    => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'returned_at'    => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'return_managed_by'    => $this->faker->numberBetween($min = 1, $max = 2),
        ];
    }
}
