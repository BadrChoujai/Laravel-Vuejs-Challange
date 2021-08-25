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
        $products =  Product::with('Category')->get();
        return $products;
    }
    public function create(Request $request)
    {
        // return Product::create($request->all());
    }

    public function proCategory($category_id){
        $product =  Product::all();
        $category = Category::where('id', $category_id);
        if ($category->exists()) {
            $category = Category::where('id', $category_id)->first();
            $product = Product::where('category_id', $category->id )->with('Category')->get();
            return $product;
        }else
            return 405;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            // 'category' => 'required',
        ]);
        
        // if($request->image != '') {   
        //     $path = public_path().'/assets/img/';
        //     //upload new file
        //     $image = $request->image;
        //     $filename = $image->getClientOriginalName();
        //     $image->move($path, $filename);
        //     //for update in table
        //     $product->update([
        //         'image' => $filename
        //     ]);
        // }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->save();
    }

    public function show($product_id)
    {
        $products =  Product::with('Category')->get();
        return $products->find($product_id);
    }

    public function update($product_id, Request $request)
    {
        $Product = Product::findOrFail($product_id);
        $Product->update($request->all());
        return $Product;
    }

    public function destroy($product_id)
    {
        Product::find($product_id)->delete();
        return 204;
    }
}
