<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $Categorys = Category::all();
        return response()->json($Category);
    }

    public function create(Request $request)
    {
        // 
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
        $Category = Category::find($id);
        $Category->update($request->all());
    }

    public function destroy($id)
    {
        $Category = Category::find($id);
        $Category->delete();
    }
}
