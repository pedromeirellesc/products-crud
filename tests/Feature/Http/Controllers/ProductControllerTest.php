<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_index(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products');
    }

    public function test_product_create(): void
    {
        $response = $this->get('/products/create');

        $response->assertStatus(200);
        $response->assertViewIs('products.create');
    }

    public function test_product_store(): void
    {
        $response = $this->post('/products', [
            'codigo' => 'Product 1',
            'descricao' => 'Product 1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('products.index');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('products', [
            'codigo' => 'Product 1',
            'descricao' => 'Product 1',
        ]);
    }

    public function test_product_store_validation(): void
    {
        $response = $this->post('/products', [
            'codigo' => '',
            'descricao' => '',
        ]);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('products.index');
        $response->assertSessionHas('errors');
    }

    public function test_product_show(): void
    {
        $product = Product::factory()->create();

        $response = $this->get('/products/'.$product->id);

        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertViewHas('product');
    }

    public function test_product_show_when_product_not_found(): void
    {
        $response = $this->get('/products/0');

        $response->assertStatus(404);
    }

    public function test_product_edit(): void
    {
        $product = Product::factory()->create();

        $response = $this->get("/products/edit/{$product->id}");

        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
        $response->assertViewHas('product');
    }

    public function test_product_edit_when_product_not_found(): void
    {
        $response = $this->get('/products/edit/0');

        $response->assertStatus(404);
    }

    public function test_product_update(): void
    {
        $product = Product::factory()->create();

        $response = $this->put("/products/{$product->id}", [
            'codigo' => 'Product 1',
            'descricao' => 'Product 1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('products.index');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('products', [
            'codigo' => 'Product 1',
            'descricao' => 'Product 1',
        ]);
    }

    public function test_product_update_validation(): void
    {
        $product = Product::factory()->create();

        $response = $this->put("/products/{$product->id}", [
            'codigo' => '',
            'descricao' => '',
        ]);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('products.index');
        $response->assertSessionHas('errors');
    }

    public function test_product_delete(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete("/products/{$product->id}");

        $response->assertStatus(302);
        $response->assertRedirectToRoute('products.index');
        $response->assertSessionHas('success');
        $this->assertSoftDeleted('products', [
            'id' => $product->id,
        ]);
    }
}
