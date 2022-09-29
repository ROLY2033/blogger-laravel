<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
   
        return [
            //
            'url' => 'posts/'. $this->faker->imageUrl('public/storage/posts', 640, 480 , null, false)

        ];
    }
}
// https://youtu.be/eC8rDAiT1OM?list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr&t=1815