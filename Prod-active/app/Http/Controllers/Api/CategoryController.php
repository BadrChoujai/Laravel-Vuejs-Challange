<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function create(Request $request)
    {
        return Category::create($request->all());
    }

    public function store(Request $request)
    {
        $Category = new Category([
            'name' => $request->input('name'),
        ]);
        $Category->save();
    }

    public function show($id)
    {
        $Category = Category::find($id);
        return $Category;
    }

    public function update($id, Request $request)
    {
        $Category = Category::findOrFail($id);
        $Category->update($request->all());
        return $Category;
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return 204;
    }
}
