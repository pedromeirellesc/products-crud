<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('products.index', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $request->validated();
        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', __('Product created successfully.'));
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $request->validated();
        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', __('Product updated successfully.'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', __('Product deleted successfully.'));
    }
}
