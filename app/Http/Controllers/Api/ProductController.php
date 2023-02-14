<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * List all products.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Find a product by it's id.
     *
     * @param Product $product
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Create a new product.
     *
     * @param StoreProductRequest $request
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        return new ProductResource($product);
    }

    /**
     * Update an existing product.
     *
     * @param StoreProductRequest $request
     * @param Product $product
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return new ProductResource($product);
    }

    /**
     * Remove a product.
     *
     * @param Product $product
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response(['message' => 'ok'], 204);
    }
}
