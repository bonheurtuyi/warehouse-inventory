<?php

namespace Tests\Unit\product;

use App\Http\Controllers\ProductController;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function it_can_store_a_new_product()
    {
        $request = new StoreProductRequest([
            'name' => 'Test Product',
            'category_id' => 2,
            'unit_id' => 2,
            'quantity' => 10,
            'code' => 'HG60',
            'price' => 100,
            'image' => $this->faker->image(storage_path('products', 640, 480)),
        ]);

        $this->actingAs($this->user())
            ->postJson(route('products.store'), $request->all())
            ->assertStatus(201);

        $product = Product::latest('id')->first();

        $this->assertEquals($request->name, $product->name);
        $this->assertEquals($request->category_id, $product->category_id);
        $this->assertEquals($request->unit_id, $product->unit_id);
        $this->assertEquals($request->quantity, $product->quantity);
        $this->assertEquals($request->code, $product->code);
        $this->assertEquals($request->price, $product->price);
        $this->assertEquals($request->image, $product->image);
    }
}
