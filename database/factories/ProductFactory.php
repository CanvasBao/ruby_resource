<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    private static int $index = 0;

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->randomCategory(),
            'name' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(10, 100) . '00',
            'description' => $this->faker->paragraphs(2, true),
            'code' => $this->faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
            'sort_no' => Product::max('sort_no') + (++static::$index),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function deleted()
    {
        return $this->state(function (array $attributes) {
            return [
                'deleted_at' => now(),
            ];
        });
    }

    private function randomCategory()
    {
        $cat = Category::get();
        if ($cat->isEmpty()) {
            return null;
        }

        return $cat->random()->id;
    }
    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Product $product) {
            //
        })->afterCreating(function (Product $product) {
            $num = $this->faker->numberBetween(1, 3);
            ProductImage::factory($num)->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
