<?php

namespace Database\Factories;

use App\Models\Image;
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
    protected $model = Image::class;

    public function definition()
    {

        return [
            //
            // fake()->imageUrl()
            
            'url' => 'posts/'.$this->faker->imageurl()
        ];
    
    
    }
    
}
// https://youtu.be/eC8rDAiT1OM?list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr&t=1815