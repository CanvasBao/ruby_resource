<?php

namespace Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        //Ngành nghề kinh doanh
        $categoriesFilePath = "database/dataInit/categories.json";
        if (File::exists($categoriesFilePath)) {
            $json = File::get($categoriesFilePath);
            $categories = json_decode($json);
            foreach ($categories as $category) {
                Category::withTrashed()->updateOrCreate(
                    ['id' => $category->id],
                    [
                        'id' => $category->id,
                        'category_name' => $category->category_name,
                        'category_slug' => $category->category_slug,
                        'image' => $category->image,
                        'title' => $category->title,
                        'sort_no' => $category->sort_no,
                        'description' => $category->description,
                        'deleted_at' => (!empty($category->deleted_at) ? date("Y/m/d", strtotime($category->deleted_at)) : null)
                    ]
                );
            }
        }

        ProductImage::truncate();
        Product::truncate();
        //sản phẩm
        $productsFilePath = "database/dataInit/products.json";
        if (File::exists($productsFilePath)) {
            $json = File::get($productsFilePath);
            $products = json_decode($json);
            foreach ($products as $product) {
                $productNew = Product::create(
                    [
                        'id' => $product->id,
                        'category_id' => $product->category_id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'description' => $product->description,
                        'code' => $product->code,
                        'sort_no' => $product->sort_no,
                        'deleted_at' => (!empty($product->deleted_at) ? date("Y/m/d", strtotime($product->deleted_at)) : null)
                    ]
                );

                foreach ($product->images as $image) {
                    $productNew->images()->create([
                        'image' => $image,
                    ]);
                }
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
