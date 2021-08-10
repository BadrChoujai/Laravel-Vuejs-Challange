<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\Product;
 
Route::get('products', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Product::all();
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
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
//  */

// Route::middleware('api')->group(function () {
//     Route::resource('products', ProductController::class);
// });

