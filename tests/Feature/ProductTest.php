<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_create_product_category_supplier()
    {
        $category = new Category();
        $category->category_name = "CAT";
        $category->save();

        $supplier = new Supplier();
        $supplier->name = "Supplier Name";
        $supplier->email = "supllier@gmail.com";
        $supplier->phone = "5554447777";
        $supplier->address = "583 Buckridge StreetsEast Jacynthe, MN 11875";
        $supplier->shopname = "ABC";
        $supplier->save();

        $product = new Product();
        $product->product_name = "Test Product Name";
        $product->product_code = "Test Product code";
        $product->category_id = $category->id;
        $product->supplier_id = $supplier->id;
        $product->buying_price = 45000;
        $product->selling_price = 5000;
        $product->buying_date = now();
        $product->product_quantity = 5;
        $product->save();

        $this->assertEquals($product->product_name, "Test Product Name");
        $this->assertEquals($product->selling_price, 5000);
        $this->assertEquals($product->category_id, $category->id);
        $this->assertEquals($product->supplier_id, $supplier->id);
    }
}
