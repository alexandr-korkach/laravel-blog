<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{

    protected $model = Article::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $body = $this->faker->paragraph(100, true);
        $description = Str::limit($body, 200);

        return [
            'title' => $this->faker->sentence(6, true),
            'body' => $body,
            'description' => $description,
            'img' => 'https://via.placeholder.com/800/5F113B/FFFFFF/?text=Laravel Blog',
            'user_id' => 1,
            'created_at' => $this->faker->dateTimeBetween('-1 years')
        ];
    }
}
