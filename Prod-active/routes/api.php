<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Api\ProductController;

// PRODUCTS API ROUTES 

Route::get('products', function() {
    $products =  Product::with('Category')->get();
    return $products;
});

Route::get('products/{id}', function($products_id) {
    $products =  Product::with('Category')->get();
    return $products->find($products_id);
});


Route::get('proCategory/{id}', function($category_id) {
    $product =  Product::all();
    $category = Category::where('id', $category_id);
    if ($category->exists()) {
        $category = Category::where('id', $category_id)->first();
        $product = Product::where('category_id', $category->id )->with('Category')->get();
        return $product;
    }else
        return 405;
});

Route::get('products/{id}', function($products_id) {
    return Product::find($products_id);
});

Route::post('products', function(Request $request) {
    return Product::create($request->all());
});

Route::put('products/{id}', function(Request $request, $products_id) {
    $Product = Product::findOrFail($products_id);
    $Product->update($request->all());

    return $Product;
});

Route::delete('products/{id}', function($products_id) {
    Product::find($products_id)->delete();

    return 204;
});

// CATEGORY API ROUTES


Route::get('categories', function () {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Category::all();
});

Route::get('categories/{id}', function ($id) {
    return Category::find($id);
});

Route::post('categories', function (Request $request) {
    return Category::create($request->all());
});

Route::put('categories/{id}', function (Request $request, $id) {
    $Category = Category::findOrFail($id);
    $Category->update($request->all());

    return $Category;
});

Route::delete('categories/{id}', function ($id) {
    Category::find($id)->delete();

    return 204;
});

