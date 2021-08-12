<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
{
    public function upload(Request $request)
    {
    //         if ($request->image != '') {
    //         // Validate (size is in KB)
    //         $request->validate([
    //             'image' => 'file|image|size:1024|dimensions:max_width=500,max_height=500',
    //         ]);

    //         $upload_path = public_path('assets/img/');
    //         $file_name = $request->image->getClientOriginalName();
    //         $generated_new_name = time() . '.' . $request->image->getClientOriginalExtension();
    //         $request->image->move($upload_path, $generated_new_name);
    //     }

    }
}
