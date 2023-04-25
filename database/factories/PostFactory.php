<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            //aqui le indicamos la informacion que queremos utilizar
            "user_id" => User::factory(),
            "tittle" => $this->faker->text(50),
            "content" => $this->faker->text(500),
            "created_at" => now()
        ];
    }
}
