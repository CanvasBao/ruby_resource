<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    private static int $index = 0;

    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->colorName() . ' Cate',
            'category_slug' => $this->faker->regexify('[A-Z0-9]{8}'),
            'sort_no' => Category::max('sort_no') + (++static::$index),
        ];
    }
}
