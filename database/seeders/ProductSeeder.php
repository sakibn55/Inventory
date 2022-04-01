<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::factory()->count(5)->create()->each(function ($supplier) {
            Category::factory()->count(2)->create()->each(function ($category) use ($supplier) {
                Product::factory()->count(2)->create([
                    'category_id' => $category->id,
                    'supplier_id' => $supplier->id,
                ]);
            });
        });
    }
}
