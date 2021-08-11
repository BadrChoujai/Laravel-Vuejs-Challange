<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($product);
    }

    public function create(Request $request)
    {
        // 
    }

    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
        ]);
        $product->save();
    }

    public function show($product_id)
    {
        $product = Product::find($product_id);
        return $product;
    }

    public function update($product_id, Request $request)
    {
        $product = Product::find($product_id);
        $product->update($request->all());
    }

    public function destroy($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
    }
}
