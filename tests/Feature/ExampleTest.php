<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Product;
use App\Description;

class ExampleTest extends TestCase
{
	use RefreshDatabase;
//	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */

	protected $jsonHeaders = ['Content-Type' => 'application/json', 'Accept' => 'application/json'];	

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function testProductsList()
    {
	$products = factory(Product::class, 3)->create();

        $this->get(route('products.index'))
	     ->assertStatus(200);
	array_map(function ($product) {
		$this->assertJson($product);
	}, $products->all());
    }

    public function testProductDescriptionsList()
    {
	$product = factory(Product::class)->create();
	$product->descriptions()->saveMany(factory(Description::class, 3)->make());

	$this->get(route('products.descriptions.index', $product->id))->assertStatus(200);
	array_map(function ($description) {
		$this->assertJson($description);
	}, $product->descriptions->all());
    }

    public function testProductCreation()
    {
	$product = factory(Product::class)->make(['name' => 'cocos']);
	$this->post(route('products.store'), $product->toArray(), $this->jsonHeaders);
	$this->assertDatabaseHas('products', ['name' => $product->name]);
																 //->assertStatus(200);
    }

}
