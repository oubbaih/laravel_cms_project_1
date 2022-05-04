<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Posts::class;
    public function definition()
    {
        return [
            //
            'user_id' => User::factory(),
            'title'   => $this->faker->sentence,
            'post_image' => $this->faker->imageUrl('900', '300'),
            'body' => $this->faker->paragraph,
            'category_id' => 12,
        ];
    }
}

    // 'name' => $this->faker->name(),
    //         'email' => $this->faker->unique()->safeEmail(),
    //         'email_verified_at' => now(),
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //         'remember_token' => Str::random(10),