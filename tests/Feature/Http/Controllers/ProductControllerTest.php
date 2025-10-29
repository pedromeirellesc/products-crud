<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testProductIndex(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('products.index');
        $response->assertViewHas('products');
    }

    public function testProductCreate(): void
    {
        $response = $this->get('/products/create');

        $response->assertStatus(200);
        $response->assertViewIs('products.create');
    }

    public function testProductStore(): void
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

    public function testProductStoreValidation(): void
    {
        $response = $this->post('/products', [
            'codigo' => '',
            'descricao' => '',
        ]);

        $response->assertStatus(302);
        $response->assertRedirectToRoute('products.index');
        $response->assertSessionHas('errors');
    }

    public function testProductShow(): void
    {
        $product = Product::factory()->create();

        $response = $this->get('/products/' . $product->id);

        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertViewHas('product');
    }

    public function testProductShowWhenProductNotFound(): void
    {
        $response = $this->get('/products/0');

        $response->assertStatus(404);
    }

    public function testProductEdit(): void
    {
        $product = Product::factory()->create();

        $response = $this->get("/products/edit/{$product->id}");

        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
        $response->assertViewHas('product');
    }

    public function testProductEditWhenProductNotFound(): void
    {
        $response = $this->get('/products/edit/0');

        $response->assertStatus(404);
    }

    public function testProductUpdate(): void
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

    public function testProductUpdateValidation(): void
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

    public function testProductDelete(): void
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
