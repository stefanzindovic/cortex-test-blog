<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->text($maxNbChars=35);
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'slug' => $slug, 
            'short_desc' => $this->faker->paragraph(3),
            'content' => $this->faker->paragraph(50),
            'user_id' => mt_rand(1, 10),
        ];
    }
}
