<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Book::class;

    public function definition()
    {

        return [
            'title'     => $this->faker->text($maxNbChars = 255),
            'authors' => $this->faker->name,
            'description'    => $this->faker->optional()->sentence(),
            'released_at'    => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'cover_image'    => $this->faker->imageUrl(200, 400, 'book'),
            'pages'    => $this->faker->numberBetween($min = 1, $max = 1500),
            'language_code'    => $this->faker->languageCode,
            'isbn'    => $this->faker->isbn13,
            'in_stock'    => $this->faker->numberBetween($min = 0, $max = 500),
        ];
    }
}
