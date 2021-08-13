<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // $products = Product::scopeWithFilters()->get();
        return ProductResource::collection($products);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
        ]);
        
        if($request->image != '') {   
            $path = public_path().'/assets/img/';
            //upload new file
            $image = $request->image;
            $filename = $image->getClientOriginalName();
            $image->move($path, $filename);
            //for update in table
            $product->update([
                'image' => $filename
            ]);
        }
        
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'category' => $request->input('category_id'),
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
